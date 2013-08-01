<?php if(!defined(APP)) header("HTTP/1.0 404 Not Found");

	class Controller {
		public function model($name) {
			$path = SITE_ROOT . '/app/models/'. $name . '.php';
			include_once $path;
			$name = $name . '_model';
			$model = new $name();
			return $model;
		}

		public function render($filename, $data='') {
			if ($data!=false) {
				foreach ($data as $key => $value) {
					${$key} = $value;
				}
			}
			include SITE_ROOT . '/app/views/' . $filename . '.php';
		}

		public function redirect($path) {
			$url = 'http://' . $_SERVER['HTTP_HOST'] . '/index.php?do=' . $path;
			header("Location: $url");
		}
	}