<?php if(!defined(APP)) header("HTTP/1.0 404 Not Found");

	class photo extends Controller {		
		public function index() {
			echo 'photo/index';
		}

		public function upload() {
			$m = $this->model('photo');
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// загрузка файла
				$img = getimagesize($_FILES['photo']['tmp_name']);
				if($img['mime'] != 'image/jpeg' && $img['mime'] != 'image/png') die('We accept only JPEG and PNG files!');
				$up_dir = 'upload/';
				if ($img['mime'] == 'image/jpeg') $temp = time() . '.jpg';
				elseif ($img['mime'] == 'image/png') $temp = time() . '.png';
				$up_file = $up_dir . $temp;
				if (!is_uploaded_file($_FILES['photo']['tmp_name'])) dbg($_FILES['photo']['error']);
				move_uploaded_file($_FILES['photo']['tmp_name'], $up_file);
				chmod($up_file, 0777);

// фильтрация данных
				$data['path'] = $temp;
				$data['title'] = $_POST['title'];
				$data['descr'] = $_POST['descr'];
				$data['date'] = time();
				$m->upload_photo($data);
				$this->redirect('main');
			} else {
				$this->render('upload');
			}
		}
	}