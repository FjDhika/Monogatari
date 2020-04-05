<?php 

/**
 * Class for Register feature
 * @page_title is the page title of the page
 */
class RegisterController extends CI_Controller
{
	private $page_title = "Register";
	
	function __construct(){
		parent::__construct();
		$this->load->model('userModel');
	}

	function index(){

		// get $_POST data and validate
		if ($this->input->get_post('submit')) {
			$username = $this->input->get_post('username');
			$password = $this->input->get_post('password');
			$time = local_to_gmt(time());
			$date = mdate('%Y/%m/%d');

			$this->userModel->addUser($username,$password,$date);
			
		}

		$data['page_title'] = $this->page_title;
		$this->load->view("registerView",$data);
	}
}

 ?>