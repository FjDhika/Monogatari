<?php 

/**
 * Class for Login feature this class will render loginView
 * @page_title is the page title of the page
 */
class LandingPageController extends CI_Controller
{
	private $page_title = "Home - Monogatari";
	
	function __construct(){
		parent::__construct();
		$this->load->model('genreModel');
		$this->load->model('storyModel');
		$this->load->helper('renderTable');
	}
	
	function index(){
		if (isset($this->session->userid)) {
			redirect(site_url('/dashboard'));
		}else{
			$data['page_title'] = $this->page_title;
			$data['genre_list'] = $this->genreModel->getGenres();

			$story = $this->storyModel->getRecommend(5);

			$data['row'] = renderCardRecom($story);

			$this->load->view("landingPageView",$data);	
		}
	}
}

 ?>