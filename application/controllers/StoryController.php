<?php 

/**
 * 
 */
class StoryController extends CI_Controller
{
	private $page_title = "Stories";

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('genreModel');
		$this->load->model('storyModel');
	}

	// Cerita Baru

	function index(){
		$data['page_title'] = $this->page_title;
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

	// Menampilkan halaman detail cerita
	function detailStory($storyid){
		$data['page_title'] = $this->page_title;
		$data = $this->getStoryData($storyid);
		$this->load->view("story/detailStoryView",$data);
	}

	// Edit and Edit Proses

	function editStoryPage($storyid){
		$data['page_title'] = $this->page_title;
		$data = $this->getStoryData($storyid);
		$this->load->view('story/createStoryView',$data);
	}

	function editStoryProses($storyid){
		if($this->input->post('submit') != null){
			$data = array();
			$config['upload_path'] = "./assets/image/cover/";
			$config['allowed_types'] ='gif|jpg|jpeg|png|PNG';
			$config['file_name'] = $this->session->username."_".$storyid;
			$config['overwrite'] = true;

			$this->load->library('upload',$config);

			$title = $this->input->post('Judul');
			$synopsis = $this->input->post('sinopsis');
			$genre = $this->input->post('Genre');

			$imageupload = $this->upload->do_upload('image');
			$image = ($imageupload)? $this->upload->data('file_name'):NULL;

			$result = $this->storyModel->updateStory($storyid, $title, $synopsis, $image, $genre);

			if($result){
				redirect(site_url("/story/$storyid"));
			}else{
				//if insertStory Failed
				echo "insert Gagal";
			}
		}else{
			// redirect(site_url('/signin-form'));
		}
	}

	// Controller untuk Halaman Discovery

	function discoverPage($param){
		$data['page_title'] = $this->page_title;
		if ($param == 'my') {
			$this->load->view('story/browseStory',$data);
		}
	}

	// Fungsi tambahan

	function getStoryData($storyid){
		$data['story'] = $this->storyModel->getStory($storyid);
		$data['genre'] = $this->genreModel->getGenres();
		$genreids = array();
		foreach ($data['story'][0]->GENRE_ID as $key => $value) {
			 $genreids[$key] = $value->GENRE_ID;
		}
		$data['genres'] = $this->genreModel->getGenreName($genreids);

		return $data;
	}
}

 ?>