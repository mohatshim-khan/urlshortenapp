<?php
	class Url_Model extends CI_Model {

		public function __construct(){

			parent::__construct();
		}	

		/**
	     * Check records for already existing url 
	     * @param $url
	     * @return Bool true or false
	     */
		public function check_url_exists($url){

			$this->db->where('url', $url);
			
			$query = $this->db->get('urls');
			
			$num_rows = $query->num_rows();

			if($num_rows>0){
				return true;
			} else {
				return false;
			}
		}

		/**
	     * Save new record to the table
	     * @param $data
	     * @return Bool true or false
	     */
		public function create_short($data){

			$insert = $this->db->insert('urls', $data);

			if($insert){
				return true;
			} else {
				return false;
			}
		}

		/**
	     * Retrieve the number of existing records.
	     * @return integer
	     */
		public function get_url_num_rows(){
			
					 $this->db->order_by('id', 'DESC');	
			$query = $this->db->get('urls');
			
			$num_rows = $query->num_rows();

			return $num_rows;
		}

		/**
	     * Retrieve top recent 100 url records. 
	     * @return array
	     */
		public function get_top_url(){
					  $this->db->order_by('id','DESC');
			$result = $this->db->get('urls', 0, 100)->result_array();
			return $result;
		} 

		/**
	     * Check records for already existing short 
	     * @param $short
	     * @return array or false
	     */
		public function check_short_exists($short){
			
					 $this->db->where('short', $short);
			$query = $this->db->get('urls');

			$num_rows = $query->num_rows();

			if($num_rows>0){
				
				$result = $query->row_array();
			
				return $result;

			} else {

				return false;
			}
		}
		
	}

/* End of file Url_model.php */
/* Location: ./application/models/url_model.php */		