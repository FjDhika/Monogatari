<?php 

/**
 * class for dashboard, it will render dashboarView
 * @page_title is the page title of the page
 */
class DashboardController extends CI_Controller
{
	private $page_title = "Dashboard - Monogatari"; 
	function __construct(){
		parent::__construct();
		$this->load->model('genreModel');
		$this->load->model('storyModel');
		$this->load->helper('renderTable');
	}

	function index(){
		$userid = $this->session->userid;
		$data['page_title'] = $this->page_title;
		$data['genre_list'] = $this->genreModel->getGenres();

		if ($userid) {
			$data['page_title'] = $this->page_title;
			$data['genre_list'] = $this->genreModel->getGenres();

			$recomStory = $this->storyModel->getRecommend(5);
			$newStory = $this->storyModel->getNewStory(5);

			$data['recom'] = renderCardDashboard($recomStory);
			$data['new'] = renderCardDashboard($newStory);
			
			$this->load->view("dashboardView",$data);	
		}else{
			redirect(site_url('/signin-form'));	
		}
	}
}

 ?>