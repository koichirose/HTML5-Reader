<?php

class Curl {

	function __construct() {
		$CI =& get_instance();
		$this->_default_fields = array(
				'apikey' => $CI->config->item('apikey'),
				'username' => $CI->config->item('username'),
				'password' => $CI->config->item('password'),
		);
	}

	function curl_req($url, $additional_fields) {
		$ch = curl_init();

		//set the target url
		curl_setopt($ch, CURLOPT_URL,$url);

		curl_setopt($ch, CURLOPT_POST, 1);
		// just return without printing the result.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$fields = array_merge($this->_default_fields, $additional_fields);

		//url-ify the data for the POST
		$fields_string = '';
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string,'&');

		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}
