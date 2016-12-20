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
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
			
			if ($this->form_validation->run() !== FALSE) {
				$post=$this->input->post();
				$post['url_name']=url_title($post['name']);
				if ($artist=$this->artists_model->createArtist($post)){
					custom_log('Artista inserito. Artista: '.$post['name']);						
				}else{
					custom_log('Errore inserimento artista. Artista: '.$post['name']);
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
				$recent_user = Model\Artists::find($post['id']);
				$recent_user->name = $post['name'];
				$recent_user->url_name = $post['url_name'];
				if ($recent_user->save(TRUE)) {
					custom_log('Artista modificato. Artista id: '.$post['id']);		
					redirect('artists/'.$post['url_name']);
				}else{
					custom_log('Errore modifica artista. Artista id: '.$id);
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
			if ($this->artists_model->findArtist($id)) {
				if ($this->artists_model->deleteArtist($id)) {
					custom_log('Artista cancellato. Artista id: '.$id);					
				}else{
					custom_log('Errore cancellazione artista. Artista id: '.$id);
				}
			}else{
				custom_log('Errore cancellazione artista inesistente. Artista id: '.$id);
			}
			redirect('artists');
		}
        
        // ------------------- callback validazione artista -------------------------------------------
        
        public function required_artist($str) {
			if (trim($str)=="") {
				$this->form_validation->set_message('required_artist', 'Campo {field} obbligatorio.');
				custom_log('Errore inserimento artista senza nome.');
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
        public function duplicate_artist($str) {
			if ($this->artists_model->findArtistByName($str)) {
				$this->form_validation->set_message('duplicate_artist', '{field} \''.$str.'\' duplicato');
				custom_log('Errore inserimento artista duplicato. Artista: '.$str);
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function required_edited_artist($str) {
			if (trim($str)=="") {
				$this->form_validation->set_message('required_edited_artist', 'Campo {field} obbligatorio.');
				custom_log('Errore modifica artista, nuovo nome non inserito.');
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function duplicate_edited_artist() {
			$nome=$this->input->post('name');
			$my_id=$this->input->post('id');
			if ($similar_artists=$this->artists_model->findArtistByName($nome)) {
				foreach ($similar_artists as $artist) {
					if ($artist->id != $my_id) {
						$this->form_validation->set_message('duplicate_edited_artist', '{field} \''.$nome.'\' duplicato');
						custom_log('Errore modifica artista, nuovo nome artista duplicato.');
						return FALSE;
					}
				}
			}
			return TRUE;
		}
		
		public function required_edited_artist_url($str) {
			if (trim($str)=="") {
				$this->form_validation->set_message('required_edited_artist_url', 'Campo {field} obbligatorio.');
				custom_log('Errore modifica artista, nuovo url artista non inserito.');
				return FALSE;
			}else{
				return TRUE;
			}
		}
		
		public function duplicate_edited_artist_url() {
			$url=trim($this->input->post('url_name'));
			$my_id=$this->input->post('id');
			if ($similar_artists=$this->artists_model->findArtistByUrlName($url)) {
				foreach ($similar_artists as $artist) {
					if ($artist->id != $my_id) {
						$this->form_validation->set_message('duplicate_edited_artist_url', '{field} \''.$url.'\' duplicato');
						custom_log('Errore modifica artista, nuovo url artista duplicato.');
						return FALSE;
					}
				}
			}
			return TRUE;
		}
        
}

?>