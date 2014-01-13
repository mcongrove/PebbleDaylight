<?php

	$timezones = array(
		array( 'value' => '-12', 'name' => '(GMT-12:00) Baker Island' ),
		array( 'value' => '-11', 'name' => '(GMT-11:00) Niue, Samoa' ),
		array( 'value' => '-10', 'name' => '(GMT-10:00) Hawaii-Aleutian, Cook Island' ),
		array( 'value' => '-9.5', 'name' => '(GMT-9:30) Marquesas Islands' ),
		array( 'value' => '-9', 'name' => '(GMT-9:00) Alaska, Gambier Island' ),
		array( 'value' => '-8', 'name' => '(GMT-8:00) Pacific' ),
		array( 'value' => '-7', 'name' => '(GMT-7:00) Mountain' ),
		array( 'value' => '-6', 'name' => '(GMT-6:00) Central' ),
		array( 'value' => '-5', 'name' => '(GMT-5:00) Eastern' ),
		array( 'value' => '-4.5', 'name' => '(GMT-4:30) Venezuelan' ),
		array( 'value' => '-4', 'name' => '(GMT-4:00) Atlantic' ),
		array( 'value' => '-3.5', 'name' => '(GMT-3:30) Newfoundland' ),
		array( 'value' => '-3', 'name' => '(GMT-3:00) Amazon, Central Greenland' ),
		array( 'value' => '-2', 'name' => '(GMT-2:00) Fernando de Noronha, South Georgia, South Sandwich Islands' ),
		array( 'value' => '-1', 'name' => '(GMT-1:00) Azores, Cape Verde, Eastern Greenland' ),
		array( 'value' => '0', 'name' => '(GMT) Greenwich Mean Time, Western European' ),
		array( 'value' => '1', 'name' => '(GMT+1:00) Central European, West African' ),
		array( 'value' => '2', 'name' => '(GMT+2:00) Eastern European, Central African' ),
		array( 'value' => '3', 'name' => '(GMT+3:00) Moscow, Eastern African' ),
		array( 'value' => '3.5', 'name' => '(GMT+3:30) Iran' ),
		array( 'value' => '4', 'name' => '(GMT+4:00) Gulf, Samara' ),
		array( 'value' => '4.5', 'name' => '(GMT+4:30) Afghanistan' ),
		array( 'value' => '5', 'name' => '(GMT+5:00) Pakistan, Yekaterinburg' ),
		array( 'value' => '5.5', 'name' => '(GMT+5:30) Indian, Sri Lanka' ),
		array( 'value' => '5.75', 'name' => '(GMT+5:45) Nepal' ),
		array( 'value' => '6', 'name' => '(GMT+6:00) Bangladesh, Bhutan, Novosibirsk' ),
		array( 'value' => '6.5', 'name' => '(GMT+6:30) Cocos Islands, Myanmar' ),
		array( 'value' => '7', 'name' => '(GMT+7:00) Indochina, Krasnoyarsk' ),
		array( 'value' => '8', 'name' => '(GMT+8:00) Chinese, Australian Western, Irkutsk' ),
		array( 'value' => '8.75', 'name' => '(GMT+8:45) Southeastern Western Australia' ),
		array( 'value' => '9', 'name' => '(GMT+9:00) Japan, Korea, Chita' ),
		array( 'value' => '9.5', 'name' => '(GMT+9:30) Australian Central' ),
		array( 'value' => '10', 'name' => '(GMT+10:00) Australian Eastern, Vladivostok' ),
		array( 'value' => '10.5', 'name' => '(GMT+10:30) Lord Howe' ),
		array( 'value' => '11', 'name' => '(GMT+11:00) Solomon Island, Magadan' ),
		array( 'value' => '11.5', 'name' => '(GMT+11:30) Norfolk Island' ),
		array( 'value' => '12', 'name' => '(GMT+12:00) New Zealand, Fiji, Kamchatka' ),
		array( 'value' => '12.75', 'name' => '(GMT+12:45) Chatham Islands' ),
		array( 'value' => '13', 'name' => '(GMT+13:00) Tonga, Phoenix Islands' ),
		array( 'value' => '14', 'name' => '(GMT+14:00) Line Island' )
	);

?>
<!DOCTYPE html>
<html>
<head>
<title>"Daylight" Configuration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="http://wearewearable.com/pconfig/pconfig.js" type="text/javascript"></script>
<style type="text/css">
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td{margin:0;padding:0;outline:0;border:0;background:transparent;vertical-align:baseline;font-size:100%}body{background:#FFF;line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}:focus{outline:0}ins{text-decoration:none}del{text-decoration:line-through}table{border-spacing:0;border-collapse:collapse}a{text-decoration:none}a:hover{text-decoration:underline}.clear{clear:both}.container{margin:0;padding:0 0 20px;width:100%}h2{padding:0 2%;width:96%;height:45px;background:#000;color:#FFF;letter-spacing:.07em;font-weight:300;font-size:14px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:45px}h3{margin:0 0 10px;padding:0;width:100%;height:20px;color:#000;letter-spacing:.07em;font-weight:300;font-size:14px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:20px}h4{margin:10px 0 30px;padding:0 2%;width:96%;height:20px;color:#000;text-align:center;font-weight:700;font-size:11px;font-family:"HelveticaNeue-Bold","Helvetica Neue Bold","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:20px}h5{margin:5px 0 0;padding:0 2%;width:96%;height:11px;color:#333;text-align:center;font-weight:300;font-size:9px;font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:11px}#themes{width:100%}#themes ul{list-style-type:none}#themes ul li{float:left;padding:10px 5% 0;width:40%;background:#EEE;text-align:center}#themes ul li.selected{background:#333}#themes ul li:first-child{padding:10px 5% 0}#themes ul li img{margin:10px auto;max-width:144px;pointer-events:none}#themes ul li div{margin:0 auto 10px;width:20px;height:20px;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;background:#FFF;pointer-events:none}#themes ul li.selected div{background:#000}#timezone,#night{padding:0;width:100%}#timezone ul,#night ul{width:100%}#timezone ul li,#night ul li{float:left;margin:2%;width:96%}#timezone ul li select,#night ul li select{width:100%;border:1px solid gray;background:#EEE;color:#000;font-weight:700;font-size:14px;font-family:"HelveticaNeue-Medium","Helvetica Neue Medium","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif}#buttons{width:100%;height:50px}#buttons ul{list-style-type:none}#buttons ul li{float:left;width:50%;height:50px;background:#000;color:#FFF;text-align:center;letter-spacing:.08em;font-weight:700;font-size:14px;font-family:"HelveticaNeue-Medium","Helvetica Neue Medium","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;line-height:50px;cursor:pointer}#buttons ul li#cancel{width:35%;background:#C33;color:#7A0000}#buttons ul li#save{width:65%;background:#3C3;color:#007A00}
</style>
</head>

<body>
	<div class="container">
		<div id="themes">
			<h2>
				Select a style:
			</h2>
			
			<ul>
				<li id="theme-simple"<?php echo $_GET['theme'] == 'simple' || !$_GET['theme'] ? ' class="selected"' : ''; ?>>
					<img src="daylight-simple.png" />
					
					<div />
				</li>
				<li id="theme-complex"<?php echo $_GET['theme'] == 'complex' ? ' class="selected"' : ''; ?>>
					<img src="daylight-complex.png" />
					
					<div />
				</li>
			</ul>
			
			<input type="hidden" id="theme" data-type="string" value="<?php echo isset($_GET['theme']) && $_GET['theme'] != 'undefined' ? $_GET['theme'] : 'simple'; ?>" />
			
			<br class="clear" />
		</div>
		
		<div id="timezone"<?php echo $_GET['theme'] == 'simple' || !$_GET['theme'] ? ' style="display: none"' : ''; ?>>
			<h2>
				Select timezone:
			</h2>
			
			<ul>
				<li>
					<select id="offset" data-type="int">
						<?php
						
							foreach($timezones as $timezone)
							{
								$selected = '';
								
								if($_GET['offset'] == $timezone['value'])
								{
									$selected = ' selected="selected"';
								} else if(!$_GET['offset'] && $timezone['value'] == '-5') {
									$selected = ' selected="selected"';
								}
								
								echo '<option value="' . floor($timezone['value']) . '"' . $selected . '>' . $timezone['name'] . '</option>';
							}
						
						?>
					</select>
				</li>
			</ul>
			
			<br class="clear" />
		</div>
		
		<div id="night"<?php echo $_GET['theme'] == 'simple' || !$_GET['theme'] ? ' style="display: none"' : ''; ?>>
			<h2>
				Show land in darkness:
			</h2>
			
			<ul>
				<li>
					<select id="nightmode" data-type="int">
						<option value="0"<?php echo ($_GET['nightmode'] && $_GET['nightmode'] == 0) ? 'selected="selected"' : ''; ?>>No</option>
						<option value="1"<?php echo ($_GET['nightmode'] && $_GET['nightmode'] == 1) ? 'selected="selected"' : ''; ?>>Yes</option>
					</select>
				</li>
			</ul>
			
			<br class="clear" />
		</div>
		
		<div id="buttons">
			<ul>
				<li id="cancel">
					Cancel
				</li>
				<li id="save">
					Apply Changes
				</li>
			</ul>
			
			<br class="clear" />
			
			<h4>
				Please allow a few moments for your changes to take affect.
			</h4>
			
			<h5>
				www.WeAreWearable.com
			</h5>
			
			<h5>
				"Daylight" watchface for Pebble, developed by Matthew Congrove
			</h5>
			
			<h5>
				www.MatthewCongrove.com
			</h5>
		</div>
	</div>
	
	<script type="text/javascript">
		function handleThemeSelection(_event) {
			switch(_event.target.id) {
				case "theme-simple":
					document.getElementById("theme-simple").className = "selected";
					document.getElementById("theme-complex").className = "";
					
					document.getElementById("timezone").style.display = "none";
					document.getElementById("night").style.display = "none";
					
					document.getElementById("theme").value = "simple";
					break;
				case "theme-complex":
					document.getElementById("theme-complex").className = "selected";
					document.getElementById("theme-simple").className = "";
					
					document.getElementById("timezone").style.display = "block";
					document.getElementById("night").style.display = "block";
					
					document.getElementById("theme").value = "complex";
					break;
			}
		}
		
		document.getElementById("theme-simple").addEventListener("click", handleThemeSelection);
		document.getElementById("theme-complex").addEventListener("click", handleThemeSelection);
		document.getElementById("cancel").addEventListener("click", PConfig.onCancel);
		document.getElementById("save").addEventListener("click", PConfig.onSubmit);
    </script>
</body>
</html>