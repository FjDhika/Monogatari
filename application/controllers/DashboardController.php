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
	}

	function index(){
		$userid = $this->session->userid;
		$data['page_title'] = $this->page_title;
		$data['genre_list'] = $this->genreModel->getGenres();

		if ($userid) {
			$this->load->view("dashboardView",$data);	
		}else{
			redirect(site_url('/signin-form'));	
		}
	}
}

 ?>