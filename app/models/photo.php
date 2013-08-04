<?php
	class photo_model extends Model {
		public function get_all_photos() {
			$r = $this->db->query("SELECT * FROM photos ORDER BY date DESC");
			return $r->all();
		}

		public function upload_photo($data) {
			if (!$data) throw new Exception("No data", 1);
			
			$sql = "INSERT INTO photos (path, title, descr, date) VALUES ('?', '?', '?', ?);";
			$this->db->query($sql, $data['path'], $data['title'], $data['descr'], $data['date']);
		}
	}