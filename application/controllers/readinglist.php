<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Readinglist extends CI_Controller {

	public function index()
	{
		//get the list and display it
		$url = "https://readitlaterlist.com/v2/get";
		$additional_fields = array(
				'state' => 'unread',
		);
		$data['results'] = json_decode($this->curl->curl_req($url, $additional_fields));
		$this->load->view('v_list', $data);
	}
}

/* End of file list.php */
/* Location: ./application/controllers/list.php */
