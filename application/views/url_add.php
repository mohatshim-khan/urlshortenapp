<h4>Url Form</h4>
<?php
if(isset($_SESSION['msg'])){
?>
	<br><div class="alert alert-warning">
		<strong><?php echo $this->session->flashdata('msg'); ?></strong>
	</div>
<?php      
}
?>
<br>
<form class="form-inline" method="post" action="<?php echo base_url(); ?>index.php/url/create">
	<div class="form-group">
		<label for="url">Enter url : &nbsp;</label>	
		<input type="url" name="url" id="url" class="form-control" value="" required />
	</div>&nbsp;
	<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>