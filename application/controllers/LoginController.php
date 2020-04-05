<?php 

/**
 * Class for Login feature this class will render loginView
 * @page_title is the page title of the page
 */
class LoginController extends CI_Controller
{
	private $page_title = "Login";
	
	function __construct(){
		parent::__construct();
		$this->load->model('userModel');
	}
	
	function index(){
		// checking data for log in auth

		if ($this->input->get_post('submit')) {
			$username = $this->input->get_post('username');
			$password = $this->input->get_post('password');

			$auth = $this->userModel->getAuth($username,$password);
			if ($auth) {
				
				$data = array('userid' => $auth[0]->user_id,
							  'profileid' => $auth[0]->profile_id);
				$this->session->set_userdata($data);

				$data['page_title'] = $this->page_title;
				$this->load->view("loginView",$data);
			}else{
				echo "<script type='text/javascript'>alert('username/password salah!');</script>";
				echo "<script>window.history.back()</script>";
			}

		}
	}

}

 ?>