<?php
R::setup(
	'mysql:host='. $CONFIG[$CONFIG_TYPE]["db_host"] .';dbname='. $CONFIG[$CONFIG_TYPE]["db_name"], 
	$CONFIG[$CONFIG_TYPE]["db_user"], 
	$CONFIG[$CONFIG_TYPE]["db_pass"]
);

/**
 * Spg Api class.
 */
Class Api {
	/**
	 * Return node informations, given the slug.
	 *
	 * @param $slug
	 */
	public function get_node_by_slug($slug) {
		return R::findOne('nodes', ' slug = ?', [$slug]);
	}
}