<?php

require 'curl.php';

//get the article and display it
$url = "http://text.readitlaterlist.com/v2/text";
$additional_fields = array(
		'images' => 1,
		'url' => $_GET['url'],
);
$results = json_decode(curl_req($url, $config['default_fields'], $additional_fields));
echo $results;
?>
