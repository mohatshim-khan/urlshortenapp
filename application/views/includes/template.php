<?php /* Master Template file for common use  */
	$this->load->view('includes/header');
?>

<br>
<?php	
	if($page_url!=''){ 
		$this->load->view($page_url); 
	} 
?>

<?php
	$this->load->view('includes/footer');
?>