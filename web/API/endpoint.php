<?php
	require __DIR__ . '/../config.php';
	require __DIR__ . '/../redbean/rb.php';
	require __DIR__ . '/../Spg/Api.php';
	
	$api = new Api();
	
	$args = explode(" ", $_POST["command"]);
	
	$command = array_shift($args);
	
	switch ($command) {
		case "getNodeBySlug":
			$arg = isset($args[0]) ? $args[0] : "";
			echo $api->get_node_by_slug($arg);
			break;
			
		case "addPlayer":
			echo $api->add_player($args[0], $args[1], $args[2]);
			break;
			
		case "addTeam":
			echo $api->add_team($args[0], $args[1]);
			break;
			
		default;
			echo "Command not found.";
	}
	