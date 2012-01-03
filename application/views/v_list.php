<table>
	<thead>
		<tr>
			<td>Title</td>
		</tr>
	</thead>
	<tbody>
<?php
	foreach ( $results->list as $item ) {
?>
		<tr>
			<td><a href="<?php echo base_url();?>read/<?php echo $item->url;?>"><?php echo $item->title;?></a></td>
			<td><?php echo date("Y-m-d h:i A", $item->time_added);?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
