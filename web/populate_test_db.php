<?php
$nodes = array(
	array(
		"name" => "Homepage",
		"slug" => ""
	),
	array(
		"name" => "About",
		"slug" => "about/"
	),
	array(
		"name" => "Admin",
		"slug" => "admin/"
	),
	array(
		"name" => "Admin console",
		"slug" => "admin/console/",
		"template" => "adminconsole.html"
	)
);

R::wipe('nodes');

foreach ($nodes as $node) {
	$bean = R::dispense('nodes');
	foreach ($node as $fieldname => $fieldvalue) {
		$bean[$fieldname] = $fieldvalue;
	}
	R::store($bean);
}
