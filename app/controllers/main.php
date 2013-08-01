<?php if(!defined(APP)) header("HTTP/1.0 404 Not Found");

	class main extends Controller {
		public function index() {
			$model = $this->model('photo');
			$data['images'] = $model->get_all_photos();
			$this->render('main', $data);
		}
	}