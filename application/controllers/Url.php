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

	/**
     * Store a newly created short url.
     */
	public function create(){

		if(isset($_POST) && !empty($_POST)){
			
			$url = $this->input->post('url');

			$url_exists = $this->url_model->check_url_exists($url);

			if($url_exists){
				
				$this->session->set_flashdata('msg', 'Url already exists.');

				redirect('url');
			
			} else {

				// Generate a alphanumeric string for short url.
				$short = substr(md5(mt_rand()), 0, 5);

				$current_datetime = date("Y-m-d H:i:s");

				$data = array(
							'url' => $url,
							'short' => $short, 
							'created_at' => $current_datetime
						);
				$insert = $this->url_model->create_short($data);

				if($insert){
				
					$this->session->set_flashdata('msg', 'Short url created.');
				
					redirect('url/listing');
				
				} else {
					show_error('Insertion Error');
				}
			}
		}
	}

	/**
	 * Display listing of top 100 urls (as per the description given by team)
	 */
	public function listing(){

		$data = array();

		$data['num_rows'] = $this->url_model->get_url_num_rows();

		$data['query'] = $this->url_model->get_top_url(); 

		$data['page_url'] = "url_listing";

		$this->load->view('includes/template',$data);
	}

	/**
     * Redirect to original url from short url  
     * @param $short
     */
	public function short($short){

		$get_short = $this->url_model->check_short_exists($short);

		if($get_short){
			
			$url = trim($get_short['url']);
			
			redirect($url);
		
		} else {
			
			$this->session->set_flashdata('msg', 'Wrong short url supplied.');
			
			redirect('url');
		}
	}
}
/* End of file Url.php */
/* Location: ./application/controllers/Url.php */	