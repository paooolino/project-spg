<?php
	require __DIR__ . '/../config.php';
	require __DIR__ . '/../redbean/rb.php';
	require __DIR__ . '/../Spg/Api.php';
	
	$api = new Api();
	
	echo $api->get_node_by_slug("");
	