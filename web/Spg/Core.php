<?php
/**
 * Spg Core class.
 */
Class Core {
	/**
	 * Return a request slug given the $_SERVER variables.
	 *
	 * @param $script_name
	 * @param $request_uri
	 * @param $query_string
	 */
	public function get_request_slug($script_name, $request_uri, $query_string) {
		$base = str_replace("index.php", "", $script_name);
		$request = str_replace($base, "", $request_uri);
		$request = str_replace("?" . $query_string, "", $request);
		return $request;
	}
}