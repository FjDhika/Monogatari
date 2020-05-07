<?php 

/**
 * 
 */
class FavoriteController extends CI_Controller
{
	
	private $page_title = "Favorite - Monogatari"; 
	function __construct(){
		parent::__construct();
		$this->load->helper('renderTable');
		$this->load->model('favoriteModel');
	}

	function index($id){
		$data['page_title'] = $this->page_title;
		if ($this->favoriteModel->) {
			# code...
		}

		// $data['row'] = renderCardStory($story);
		// $this->load->view('story/browseStory',$data);
	}
}

 ?>