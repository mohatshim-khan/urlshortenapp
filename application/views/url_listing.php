<h4>Url Listing</h4><br>

<table class="table table-bordered">
<thead>
	<th>SNo.</th>
	<th>Url</th>
	<th>Short Url</th>	
</thead>	
<tbody>
<?php 
if($num_rows>0){
	$sno=1;
	foreach($query as $row){

		$id = trim($row['id']);
		$url = trim($row['url']);
		$short = trim($row['short']);
	?>
	<tr>
		<td><?php echo $sno; ?>.</td>
		<td><?php echo $url; ?></td>
		<td><a href="<?php echo base_url(); ?>url/short/<?php echo $short; ?>" target="_blank"><?php echo base_url(); ?>url/short/<?php echo $short; ?></a></td>
	</tr>
	<?php
		$sno++;	
	}	
} else { ?>
	<tr>
		<td colspan="3">No record exists.</td>
	</tr>
<?php
}
?>	
</tbody>
</table>	