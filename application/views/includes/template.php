<?php /* Master Template file for commonly used files  */
	$this->load->view('includes/header');
?>

<?php	
	if($page_url!=''){ 
		$this->load->view($page_url); 
	} 
?>

<?php
	$this->load->view('includes/footer');
?>