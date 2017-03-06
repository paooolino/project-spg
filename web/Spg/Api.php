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
	
	/**
	 * Create a new player.
	 *
	 * @param $name
	 * @param $surname
	 * @param $country
	 */
	public function add_player($name, $surname, $country) {
		$player = R::dispense('players');
		$player->name = $name;
		$player->surname = $surname;
		$player->country = $country;
		$id = R::store($player);
		return R::load('players', $id);
	}
	
	/**
	 * Create a new team.
	 *
	 * @param $teamname
	 * @param $country
	 */
	public function add_team($teamname, $country) {
		$team = R::dispense('teams');
		$team->teamname = $teamname;
		$team->country = $country;
		$id = R::store($team);
		return R::load('teams', $id);
	}
}