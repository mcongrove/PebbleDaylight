/**
 * This code is provided under the Apache 2.0 license.
 * Please read the LICENSE.md file for more information
 * 
 * Copyright (c) 2013 Matthew Congrove (http://github.com/mcongrove)
 */
#include <pebble.h>

static char THEME[7] = "simple";
static int OFFSET = -5;
static int NIGHT = 0;

Window *window;
GBitmap *world_image;
GBitmap *world_image_night;
BitmapLayer *world_layer;
BitmapLayer *world_layer_night;

typedef struct {
  Layer *bar_layer;
} BarData;

static BarData bars[24];

enum {
	KEY_THEME,
	KEY_OFFSET,
	KEY_NIGHT
};

static void mark_all_dirty() {
	for (int i = 0, x = 24; i < x; i++) {
		BarData *bar_data = &bars[i];
		layer_mark_dirty(bar_data->bar_layer);
	}
}

static void set_theme() {
	if (persist_exists(KEY_THEME)) {
		persist_read_string(KEY_THEME, THEME, 7);
	}
	
	APP_LOG(APP_LOG_LEVEL_INFO, "SELECTED THEME: %s", THEME);
	
	bool hide = strcmp(THEME, "simple") == 0 ? true : false;
	
	layer_set_hidden(bitmap_layer_get_layer(world_layer), hide);
	layer_set_hidden(bitmap_layer_get_layer(world_layer_night), hide);
}

static void set_offset() {
	if (persist_exists(KEY_OFFSET)) {
		OFFSET = persist_read_int(KEY_OFFSET);
	}
	
	if (strcmp(THEME, "simple") == 0) {
		OFFSET = 0;
	}
	
	APP_LOG(APP_LOG_LEVEL_INFO, "SELECTED OFFSET: %d", OFFSET);
	
	mark_all_dirty();
}

static void set_night_mode() {
	if (persist_exists(KEY_NIGHT)) {
		NIGHT = persist_read_int(KEY_NIGHT);
	}
	
	bool hide = NIGHT == 0 ? true : false;
	
	layer_set_hidden(bitmap_layer_get_layer(world_layer_night), hide);
	
	APP_LOG(APP_LOG_LEVEL_INFO, "SELECTED NIGHT MODE: %d", NIGHT);
	
	mark_all_dirty();
}

static void in_received_handler(DictionaryIterator *iter, void *context) {
	Tuple *theme_tuple = dict_find(iter, KEY_THEME);
	Tuple *timezone_tuple = dict_find(iter, KEY_OFFSET);
	
	if (theme_tuple) {
		persist_write_string(KEY_THEME, theme_tuple->value->cstring);
		strncpy(THEME, theme_tuple->value->cstring, 7);
		
		set_theme();
	}
	
	if (timezone_tuple) {
		int timezone = timezone_tuple->value->data[0];
		
		// We have to subtract 256 to fix a weird issue with how Pebble handles negative ints
		if (timezone > 24) {
			timezone = timezone - 256;
		}
		
		persist_write_int(KEY_OFFSET, timezone);
		OFFSET = timezone;
		
		set_offset();
	}
}

static void in_dropped_handler(AppMessageResult reason, void *context) {
	
}

static void handle_hour_tick(struct tm *tick_time, TimeUnits units_changed) {
	mark_all_dirty();
}

static void bar_layer_update_callback(Layer *layer, GContext* ctx) {
	time_t now = time(NULL);
	struct tm *t = localtime(&now);
	
	GRect bounds = layer_get_bounds(layer);
	GRect frame = layer_get_frame(layer);
	
	int id = (23 - (frame.origin.x / 6));
	int hour = t->tm_hour - OFFSET;
	int light_start = (hour - 6);
	int light_end = (hour + 6);
	
	graphics_context_set_fill_color(ctx, GColorBlack);
	
	if (id > light_start && id < light_end) {
		graphics_context_set_fill_color(ctx, GColorWhite);
	}
	
	if (light_end > 23 && id < (light_end % 23)) {
		graphics_context_set_fill_color(ctx, GColorWhite);
	}
	
	if (id > (23 + light_start)) {
		graphics_context_set_fill_color(ctx, GColorWhite);
	}
	
	graphics_fill_rect(ctx, bounds, 0, GCornerNone);
}

static void create_bar_layers() {
	Layer *window_layer = window_get_root_layer(window);
	
	for (int i = 0, x = 24; i < x; i++) {
		BarData *bar_data = &bars[i];

		bar_data->bar_layer = layer_create(GRect((i * 6), 0, 6, 168));
		layer_set_update_proc(bar_data->bar_layer, bar_layer_update_callback);
		layer_add_child(window_layer, bar_data->bar_layer);
	}
}

static void init() {
	app_message_register_inbox_received(in_received_handler);
	app_message_register_inbox_dropped(in_dropped_handler);
	app_message_open(64, 0);
	
	window = window_create();
	window_set_background_color(window, GColorWhite);
	window_set_fullscreen(window, true);
	window_stack_push(window, true);
	
	Layer *window_layer = window_get_root_layer(window);
	
	create_bar_layers();
	
	// Create the world image
	world_image = gbitmap_create_with_resource(RESOURCE_ID_IMAGE_WORLD);
	world_layer = bitmap_layer_create(layer_get_frame(window_layer));
	bitmap_layer_set_bitmap(world_layer, world_image);
	bitmap_layer_set_compositing_mode(world_layer, GCompOpAnd);
	layer_add_child(window_layer, bitmap_layer_get_layer(world_layer));
	
	// Create the night world image
	world_image_night = gbitmap_create_with_resource(RESOURCE_ID_IMAGE_WORLD_NIGHT);
	world_layer_night = bitmap_layer_create(layer_get_frame(window_layer));
	bitmap_layer_set_bitmap(world_layer_night, world_image_night);
	bitmap_layer_set_compositing_mode(world_layer_night, GCompOpOr);
	layer_add_child(window_layer, bitmap_layer_get_layer(world_layer_night));
	
	tick_timer_service_subscribe(HOUR_UNIT, handle_hour_tick);
	
	set_theme();
	set_offset();
	set_night_mode();
}

static void deinit() {
	window_destroy(window);
	gbitmap_destroy(world_image);
	gbitmap_destroy(world_image_night);
	bitmap_layer_destroy(world_layer);
	bitmap_layer_destroy(world_layer_night);
	
	for (int i = 0, x = 24; i < x; i++) {
		BarData *bar_data = &bars[i];
		layer_destroy(bar_data->bar_layer);
	}
	
	tick_timer_service_unsubscribe();
	app_message_deregister_callbacks();
}

int main(void) {
	init();
	app_event_loop();
	deinit();
}