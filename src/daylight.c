/**
 * This code is provided under the Apache 2.0 license.
 * Please read the LICENSE.md file for more information
 * 
 * Copyright (c) 2013 Matthew Congrove (http://github.com/mcongrove)
 */
#include <pebble.h>

Window *window;
static char theme[6] = "simple";

enum {
	KEY_THEME
};

typedef struct {
  Layer *bar_layer;
} BarData;

static BarData bars[24];

static void set_theme() {
	if (persist_exists(KEY_THEME)) {
		persist_read_string(KEY_THEME, theme, 6);
	}
	
	APP_LOG(APP_LOG_LEVEL_INFO, "SELECTED THEME: %s", theme);
	
//	bool hide = strcmp(theme, "simple") == 0 ? true : false;
}

static void in_received_handler(DictionaryIterator *iter, void *context) {
	Tuple *theme_tuple = dict_find(iter, KEY_THEME);
	
	if (theme_tuple) {
		APP_LOG(APP_LOG_LEVEL_INFO, "SETTING THEME: %s", theme_tuple->value->cstring);

		persist_write_string(KEY_THEME, theme_tuple->value->cstring);
		strncpy(theme, theme_tuple->value->cstring, 6);
		
		set_theme();
	}
}

static void in_dropped_handler(AppMessageResult reason, void *context) {
	
}

static void mark_all_dirty() {
	for(int i = 0, x = 24; i < x; i++) {
		BarData *bar_data = &bars[i];
		layer_mark_dirty(bar_data->bar_layer);
	}
}

static void handle_hour_tick(struct tm *tick_time, TimeUnits units_changed) {
	mark_all_dirty();
}

static void bar_layer_update_callback(Layer *layer, GContext* ctx) {
//	time_t now = time(NULL);
//	struct tm *t = localtime(&now);
	
	GRect bounds = layer_get_bounds(layer);
	GRect frame = layer_get_frame(layer);
	
	int i = frame.origin.x / 6;
	
	if(i % 2 == 0) {
		graphics_context_set_fill_color(ctx, GColorBlack);
	} else {
		graphics_context_set_fill_color(ctx, GColorWhite);
	}
	
	graphics_fill_rect(ctx, bounds, 0, GCornerNone);
}

static void create_bar_layers() {
	Layer *window_layer = window_get_root_layer(window);
	
	for(int i = 0, x = 24; i < x; i++) {
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
	
	create_bar_layers();
	
	tick_timer_service_subscribe(HOUR_UNIT, handle_hour_tick);
	
	set_theme();
	
	mark_all_dirty();
}

static void deinit() {
	window_destroy(window);
	
	for(int i = 0, x = 24; i < x; i++) {
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