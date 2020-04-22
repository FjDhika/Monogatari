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
	}
	
	function index(){
		if (isset($this->session->userid)) {
			redirect(site_url('/dashboard'));
		}else{
			$data['page_title'] = $this->page_title;
			$this->load->view("landingPageView",$data);	
		}
	}
}

 ?>