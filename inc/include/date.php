<?php

/*
 *	DATE: LOCAL FORMAT
 */
 
function getLocalDate($seconds, $format) {
	$date = new DateTime(gmdate("F jS, Y g:i A", $seconds));
	$date->setTimezone(new DateTimeZone($_SESSION["time_zone"]));
	return $date->format($format);
}

if(!isset($_SESSION["time_zone"])) {
	$_SESSION["time_zone"] = "America/Los_Angeles";
	$geoip = json_decode(file_get_contents("http://freegeoip.net/json/".$_SERVER["REMOTE_ADDR"]), true);
	if(isset($geoip["time_zone"]) && in_array($geoip["time_zone"], timezone_identifiers_list())) {
		$_SESSION["time_zone"] = $geoip["time_zone"];
	}
}