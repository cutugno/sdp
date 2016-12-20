<?php

	class Artists_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getArtists() {
			return Model\Artists::order_by('name', 'ASC')->all();
		}
		
		public function createArtist($artist) {
			return Model\Artists::make($artist)->save(TRUE);
		}
		
		public function findArtist($id) {
			return Model\Artists::find($id);
		}
		
		public function findArtistByName($value) {
			return Model\Artists::find_by_name(trim($value));
		}
		
		public function findArtistByUrlName($value) {
			return Model\Artists::find_by_url_name(trim($value));
		}
		
		public function deleteArtist($id) {
			return Model\Artists::delete($id);
		}
	}
	
?>
