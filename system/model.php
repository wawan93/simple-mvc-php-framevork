<?php if(!defined(APP)) header("HTTP/1.0 404 Not Found");

	class Model {
		protected $db;

		public function __construct() {
			$this->db = new Db();
		}
		
		public function escape($data) {
			array_walk_recursive($data, array($this->db, 'real_escape_string' )); 
		}
	}