<?php 

/**
 * Controller for story and chapter page.
 */
class StoryController extends CI_Controller
{
	private $page_title = "Stories";
	private $page_title_chapter = "Chapter";

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('genreModel');
		$this->load->model('storyModel');
		$this->load->model('chapterModel');
	}
//========================= Function to manage stories =========================
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

	// Edit Cerita and Edit Proses Cerita

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
//=========================== Function to manage Chapters =======================
	
	// rendering create chapter view
	function renderCreateChapter($storyid){
		$data['page_title'] = 'Create '.$this->page_title_chapter;
		$data['subtitle'] = 'Create your chapters';
		$data['link'] = current_url().'/create';
		$this->load->view('chapters/createChapterView',$data);
	}

	// rendering detail chapter view
	function renderChapterDetail($chapterid){
		$data['page_title'] = $this->page_title_chapter;
		$data['chapter'] = $this->chapterModel->getChapterByID($chapterid);
		if(isset($data['chapter']))
			$this->load->view('chapters/detailChapterView',$data);
		else
			echo "not found";
	}

	function renderChapterEdit($chapterid){
		$data['page_title'] = 'Edit '.$this->page_title_chapter;
		$data['subtitle'] = 'Create your chapters';
		$data['link'] = current_url().'/proses/';
		$data['chapter'] = $this->chapterModel->getChapterByID($chapterid);
		$this->load->view('chapters/createChapterView',$data);
	}
	// function to inserting chapter data
	function newChapterProses($storyid){
		if ($this->input->post('submit') != null ){
			$title = $this->input->post('Judul');
			$content = $this->input->post('chapter_content');
			$chapterid = uniqid();
			$result = $this->chapterModel->insertChapter($storyid, $chapterid, $title,
														 $content, "PUBLISHED");
			if($result){
				redirect(site_url('/chapter/read/'.$chapterid));
			}else{
				// Balik ke page sebelumnya.
			}
		}
	}

	// function to edit chapter data
	function editChapterProses($chapterid){
		if ($this->input->post('submit') != null ){
			$oldChapter = $this->chapterModel->getChapterByID($chapterid);
			$title = $this->input->post('Judul');
			$content = $this->input->post('chapter_content');
			$result = $this->chapterModel->updateChapter($oldChapter->STORY_ID, $chapterid,
														 $title, $content, "PUBLISHED");
			if($result){
				redirect(site_url('/chapter/read/'.$chapterid));
			}else{
				// Balik ke page sebelumnya.
			}
		}
	}

	function deleteChapterProses($chapterid){
		$chapter = $this->chapterModel->getChapterByID($chapterid);
		$result = $this->chapterModel->deleteChapter($chapterid);
		if ($result) {
			redirect(site_url('story/'.$chapter->STORY_ID));
		}
	}
	// funtion to handle uploaded image at create chapter view
	function tinymceUpload() {
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/image/chapter_img/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/image/chapter_img/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './assets/image/chapter_img/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'./assets/image/chapter_img/'.$data['file_name'];
            }
        }
	}
	// function to handle deleted image at creat chapter view
	function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

	// Controller untuk Halaman Discovery
	function discoverPage($param){
		$data['page_title'] = $this->page_title;
		if ($param == 'my') {
			$this->load->view('story/browseStory',$data);
		}
	}


//=========================== Heper Function ================================
	// function to retrieve story data
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