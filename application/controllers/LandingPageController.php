<?php 

/**
 * Class for Login feature this class will render loginView
 * @page_title is the page title of the page
 */
class LandingPageController extends CI_Controller
{
	private $page_title = "Landing Page/Home";
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$data['page_title'] = $this->page_title;
		$this->load->view("landingPageView",$data);
	}
}

 ?>