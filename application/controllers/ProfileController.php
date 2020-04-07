<?php 

/**
 * Class for profile feature, it will render profile view
 * @title_page is page title
 */
class ProfileController extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('userProfileModel','profileModel');
		$this->load->helper('CalculateDate');
	}

	function index(){
		$result = $this->profileModel->getData($this->session->profileid);

		$data['name'] = ($result[0]->DISPLAY_NAME != null)?$result[0]->DISPLAY_NAME:$_SESSION['username'];
		$data['age'] = ($result[0]->BIRTH_DATE != null)?calculateDate($result[0]->BIRTH_DATE):"-";
		$data['gender'] = ($result[0]->GENDER != null)?$result[0]->GENDER:"-";

		$this->load->view('profiles/profileView',$data);
	}

	// Function to render edit form of user profile
	function editForm(){
		//get user profile data here;
		$this->load->view('profiles/editProfileView');
	}
}

 ?>