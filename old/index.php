<?php

require 'curl.php';

//get the list and display it
$url = "https://readitlaterlist.com/v2/get";
$additional_fields = array(
		'state' => 'unread',
);
$results = json_decode(curl_req($url, $config['default_fields'], $additional_fields));
?>
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
			<td><a href="read.php?url=<?php echo $item->url;?>"><?php echo $item->title;?></a></td>
			<td><?php echo date("Y-m-d h:i A", $item->time_added);?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
