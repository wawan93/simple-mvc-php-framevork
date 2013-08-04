<?php if(!defined(APP)) header("HTTP/1.0 404 Not Found"); 

function dbg($var) {
	if (MODE === 'dev') {
		echo "<pre>";
		var_dump($var);
		echo "</pre>";
		die();
	} elseif (MODE === 'prod') {
		die('Site is in production mode! Delete all dbg() queries!');
	} 
}

class Db {
	
	protected static $instance;

    private function __clone() {}
    private function __wakeup() {}
	private function __construct() {
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_BASE);
	}

	public static function get_instance() {
		if ( !isset(self::$instance) ) {
            $class = __CLASS__;
            self::$instance = new $class();
            return self::$instance;
        }
        return self::$instance;
	}

	public function query($sql) {
		$args = func_get_args();
		$db = $this->db;

		$sql = array_shift($args);

		$args = array_map(function($param) {
			return $this->db->real_escape_string($param);
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