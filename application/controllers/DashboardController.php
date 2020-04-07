<?php 

/**
 * class for dashboard, it will render dashboarView
 * @page_title is the page title of the page
 */
class DashboardController extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		$userid = $this->input->session['userid'];
		if (isset($userid)) {
			$this->load->view("dashboardView");	
		}else{
			redirect(site_url('/signin'));	
		}
	}
}

 ?>