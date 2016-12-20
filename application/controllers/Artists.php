<?php if (!defined('BASEPATH')) die ('No direct script access allowed!');

class Artists extends CI_Controller {
        public function __construct() {
                parent::__construct();
                $this->output->enable_profiler(FALSE);
        }

		/* visualizzazione elenco e inserimento nuovo artista */
        public function index() {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Nome', 'callback_required_artist|callback_duplicate_artist');
			$this->form_validation->set_rules('url_name', 'URL', 'callback_required_url|callback_duplicate_url');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			
			if ($this->form_validation->run() !== FALSE) {
				$post=$this->input->post();
				$post['url_name']=url_title($post['name']);
				if ($artist=$this->artists_model->createArtist($post)){
					custom_log('Artista inserito. Dati: '.json_encode($post));						
				}else{
					custom_log('Errore inserimento artista. Dati: '.json_encode($post));
				}
			}
							
			$artists = $this->artists_model->getArtists();
			foreach ($artists as $key=>$val) {
				$artists[$key]->modified_at=convertDateTime($val->modified_at,0);
				$artists[$key]->created_at=convertDateTime($val->created_at,0);
			}
			$data['artists']=$artists;

			$this->load->view('common/open');
			$this->load->view('artists', $data);
			$this->load->view('common/close');
        }  
        
        /* visualizzazione dettaglio artista e modifica artista */
        public function single($artist) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Nome', 'callback_required_edited_artist|callback_duplicate_edited_artist'); // aggiungere callback nome artista esistente con id diverso da artista che sto modificando
			$this->form_validation->set_rules('url_name', 'URL', 'callback_required_edited_artist_url|callback_duplicate_edited_artist_url'); // aggiungere callback URL artista esistente con id diverso da artista che sto modificando
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			
			if ($this->form_validation->run() !== FALSE) {
				$post=$this->input->post();
				$edited_artist=Model\Artists::find($post['id']);
				$edited_artist->name=$post['name'];
				$edited_artist->url_name=$post['url_name'];
				if ($edited_artist->save(TRUE)) {
					custom_log('Artista modificato. Dati: '.json_encode($post));		
					redirect('artists/'.$post['url_name']);
				}else{
					custom_log('Errore modifica artista. Dati: '.json_encode($post));
					echo "errore modifica artista";
				}
			}
			
			$artist=$this->artists_model->findArtistByUrlName($artist);
			$artist=$artist[0];
			$artist->modified_at=convertDateTime($artist->modified_at,0);
			$artist->created_at=convertDateTime($artist->created_at,0);	
			$data['artist']=$artist;
			
			$this->load->view('common/open');
			$this->load->view('artists_single', $data);
			$this->load->view('common/close');
		
		}      
        
        public function delete($id) {
			if ($deleted_artist=$this->artists_model->findArtist($id)) {
				if ($this->artists_model->deleteArtist($id)) {
					custom_log('Artista cancellato.');					
				}else{
					custom_log('Errore cancellazione artista.');
				}
			}else{
				custom_log('Errore cancellazione artista inesistente.');
			}
			redirect('artists');
		}
        
        // ------------------- callback validazione artista -------------------------------------------
        
        public function required_artist() {
			$post=$this->input->post();
			if (trim($post['name'])=="") {
				$this->form_validation->set_message('required_artist', 'Campo {field} obbligatorio.');
				custom_log('Errore inserimento artista, nome non inserito. Dati: '.json_encode($post));
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
        public function duplicate_artist() {
			$post=$this->input->post();
			if ($this->artists_model->findArtistByName($post['name'])) {
				$this->form_validation->set_message('duplicate_artist', '{field} \''.$post['name'].'\' duplicato');
				custom_log('Errore inserimento artista, nome duplicato. Dati: '.json_encode($post));
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function required_url() {
			$post=$this->input->post();
			if (trim($post['url_name'])=="") {
				$this->form_validation->set_message('required_url', 'Campo {field} obbligatorio.');
				custom_log('Errore inserimento artista, url non inserito. Dati: '.json_encode($post));
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
        public function duplicate_url() {
			$post=$this->input->post();
			if ($this->artists_model->findArtistByUrlName($post['url_name'])) {
				$this->form_validation->set_message('duplicate_url', '{field} \''.$post['url_name'].'\' duplicato');
				custom_log('Errore inserimento artista, url duplicato. Dati: '.json_encode($post));
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function required_edited_artist() {
			$post=$this->input->post();
			if (trim($post['name']=="")) {
				$this->form_validation->set_message('required_edited_artist', 'Campo {field} obbligatorio.');
				custom_log('Errore modifica artista, nuovo url non inserito. Dati: '.json_encode($post));
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function duplicate_edited_artist() {
			$post=$this->input->post();
			if ($similar_artists=$this->artists_model->findArtistByName($post['name'])) {
				foreach ($similar_artists as $artist) {
					if ($artist->id != $post['id']) {
						$this->form_validation->set_message('duplicate_edited_artist', '{field} \''.$post['name'].'\' duplicato');
						custom_log('Errore modifica artista, nuovo nome artista duplicato. Dati: '.json_encode($post));
						return FALSE;
					}
				}
			}
			return TRUE;
		}
		
		public function required_edited_artist_url() {
			$post=$this->input->post();
			if (trim($post['url_name'])=="") {
				$this->form_validation->set_message('required_edited_artist_url', 'Campo {field} obbligatorio.');
				custom_log('Errore modifica artista, nuovo url artista non inserito. Dati: '.json_encode($post));
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function duplicate_edited_artist_url() {
			$post=$this->input->post();
			if ($similar_artists=$this->artists_model->findArtistByUrlName($post['url_name'])) {
				foreach ($similar_artists as $artist) {
					if ($artist->id != $post['id']) {
						$this->form_validation->set_message('duplicate_edited_artist_url', '{field} \''.$post['url_name'].'\' duplicato');
						custom_log('Errore modifica artista, nuovo url artista duplicato. Dati: '.json_encode($post));
						return FALSE;
					}
				}
			}
			return TRUE;
		}
        
}

?>
