<?php if(!defined(APP)) header("HTTP/1.0 404 Not Found"); 

if (MODE === 'dev') {
	function dbg($var) {
		echo "<pre>";
		var_dump($var);
		echo "</pre>";
		die();
	}
}

class Db {
	
	public function __construct() {
		$this->db = new mysqli('localhost', 'root', '123', 'gallery');
	}

	public function query($sql) {
		$args = func_get_args();
		$db = $this->db;

		$sql = array_shift($args);

		$args = array_map(function($param) {
			return $this->db->escape_string($param);
		}, $args);

		$sql = str_replace(array('%', '?'), array('%%', '%s'), $sql);
		array_unshift($args, $sql);
		$sql = call_user_func_array('sprintf', $args);
		$this->last = $this->db->query($sql);
		if($this->last == false) die('Database error: '. $this->db->error);

		return $this;
	}

	public function assoc() {
		return $this->last->fetch_assoc();
	}

	public function all() {
		while ($row = $this->last->fetch_assoc()) $res[] = $row;
		return $res;
	}

}