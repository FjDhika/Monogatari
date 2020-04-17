<?php 

/**
 * 
 */
class StoryController extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('genreModel');
		$this->load->model('storyModel');
	}

	function index(){
		$data['genre'] = $this->genreModel->getGenres();
		$this->load->view('story/createStoryView',$data);
	}

	function newStoryProses(){
		if($this->input->post('submit') != null){
			$data = array();
			$storyUUID = uniqid();
			$config['upload_path'] = "./assets/image/cover/";
			$config['allowed_types'] ='gif|jpg|jpeg|png|PNG';
			$config['file_name'] = $this->session->username."_".$storyUUID;
			$config['overwrite'] = true;

			$this->load->library('upload',$config);

			$title = $this->input->post('Judul');
			$synopsis = $this->input->post('sinopsis');
			$genre = $this->input->post('Genre');

			$imageupload = $this->upload->do_upload('image');
			$image = ($imageupload)? $this->upload->data('file_name'):NULL;

			$result = $this->storyModel->insertStory($storyUUID, $title, $synopsis, $image, $genre);

			if($result){
				redirect(site_url("/story/$storyUUID"));
			}else{
				//if insertStory Failed
				echo "insert Gagal";
			}
		}else{
			// redirect(site_url('/signin-form'));
		}
	}

	function detailStory($storyid){
		$data['story'] = $this->storyModel->getStory($storyid);
		$genreids = array();
		foreach ($data['story'][0]->GENRE_ID as $key => $value) {
			 $genreids[$key] = $value->GENRE_ID;
		}
		$data['genre'] = $this->genreModel->getGenreName($genreids);

		$this->load->view("story/detailStoryView",$data);
	}
}

 ?>