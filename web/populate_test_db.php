<?php
$nodes = array(
	array(
		"name" => "Homepage",
		"slug" => "",
		"template" => "home"
	),
	array(
		"name" => "About",
		"slug" => "about/",
		"template" => "about"
	),
	array(
		"name" => "Admin",
		"slug" => "admin/",
		"template" => "admin"
	),
	array(
		"name" => "Admin console",
		"slug" => "admin/console/",
		"template" => "adminconsole"
	)
);

R::wipe('nodes');
R::wipe('players');
R::wipe('teams');

foreach ($nodes as $node) {
	$bean = R::dispense('nodes');
	foreach ($node as $fieldname => $fieldvalue) {
		$bean[$fieldname] = $fieldvalue;
	}
	R::store($bean);
}
