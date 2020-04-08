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
		$this->load->model('userProfileModel','profile');
	}
	
	function index(){
		if(isset($this->session->userid)){
			redirect(site_url('/dashboard'));
		}else{
			$data['page_title'] = $this->page_title;
			$this->load->view("loginView",$data);
		}
	}

	function prosesLogin(){
		// checking data for log in auth

		if ($this->input->get_post('submit')) {
			$username = $this->input->get_post('username');
			$password = $this->input->get_post('password');

			$auth = $this->userModel->getAuth($username,$password);

			if ($auth) {
				$profile = $this->profile->getNameAndImage($auth[0]->profile_id);
				$display = ($profile[0]->DISPLAY_NAME != null) ? $profile[0]->DISPLAY_NAME : $auth[0]->username;
				$image = ($profile[0]->PROFILE_IMAGE != null) ? base_url("assets/image/".$profile[0]->PROFILE_IMAGE) : base_url('assets/image/a.128.jpg');
				$data = array('userid' => $auth[0]->user_id,
							  'profileid' => $auth[0]->profile_id,
							  'username'=>$auth[0]->username,
							  'display'=>$display,
							  'image'=>$image);

				$this->session->set_userdata($data);

				redirect(site_url('/dashboard'));
				
			}else{
				echo "<script type='text/javascript'>alert('username/password salah!');"
					  ."location='".site_url('/signin-form')."';</script>";

			}

		}else{
			redirect(site_url('/signin-form'));
		}
	}

	function authout(){
		unset(
			$_SESSION['userid'],
			$_SESSION['profileid'],
			$_SESSION['username'],
			$_SESSION['display'],
			$_SESSION['image']
		);

		redirect(base_url());
	}

}

 ?>