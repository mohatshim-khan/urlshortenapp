<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Url extends CI_Controller {

	/**
     * Child constructor initiating parent constructor
     */
	public function __construct(){
		parent::__construct();
	}

	/**
     * Display url form for creating new short url. 
     */
	public function index(){
		
		$data = array();

		$data['page_url'] = "url_add";

		$this->load->view('includes/template',$data);
	}
}
/* End of file Url.php */
/* Location: ./application/controllers/Url.php */	