<?php

require 'config.php';

function curl_req($url, $default_fields, $additional_fields) {
	$ch = curl_init();

	//set the target url
	curl_setopt($ch, CURLOPT_URL,$url);

	curl_setopt($ch, CURLOPT_POST, 1);
	// just return without printing the result.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	$fields = array_merge($default_fields, $additional_fields);

	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string,'&');

	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
