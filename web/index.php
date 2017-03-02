<?php
	require __DIR__ . '/config.php';
	require __DIR__ . '/redbean/rb.php';
	require __DIR__ . '/Spg/Core.php';
	require __DIR__ . '/Spg/Api.php';
	
	if ($CONFIG_TYPE == "TEST") {
		require __DIR__ . '/populate_test_db.php';
	}
	
	$core = new Core();
	$api = new Api();
	
	$request_slug = $core->get_request_slug(
		$_SERVER["SCRIPT_NAME"],
		$_SERVER["REQUEST_URI"],
		$_SERVER["QUERY_STRING"]
	);
	
	$item = $api->get_node_by_slug($request_slug);
	$tpl = file_get_contents("templates/" . $item->template);
	
	echo $tpl;
	