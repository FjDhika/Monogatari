<?php 

/**
 * Class for profile feature, it will render profile view
 * @title_page is page title
 */
class ProfileController extends CI_Controller
{
	private $page_title = "Profile"; 
	
	function __construct(){
		parent::__construct();
		$this->load->model('userProfileModel','profileModel');
		$this->load->model('userModel');
		$this->load->model('genreModel');
		$this->load->model('storyModel');
		$this->load->helper('CalculateDate');
		$this->load->helper('renderTable');
	}

	function index(){

		if(isset($this->session->profileid)){
			$result = $this->profileModel->getData($this->session->profileid);
			$user = $this->userModel->getUser($this->session->userid);

			$data['isMine'] = true;

			$data['name'] = ($result[0]->DISPLAY_NAME != null)?$result[0]->DISPLAY_NAME:$_SESSION['username'];
			$data['username'] = $_SESSION['username'];
			$data['age'] = ($result[0]->BIRTH_DATE != null)?calculateDate($result[0]->BIRTH_DATE):"-";
			$data['gender'] = ($result[0]->GENDER != null)?$result[0]->GENDER:"-";
			$data['date_created'] = $user[0]->DATE_CREATED;
			
			$data['genre_list'] = $this->genreModel->getGenres();
			//get story data
			$story = $this->storyModel->getStoryByUserID($this->session->userid);
			$data['row'] = renderCardStory($story);
			$data['zeroRecordMsg'] = 'You Have No Stories yet';

			$data['page_title'] = $this->page_title;
			$this->load->view('profiles/profileView',$data);
		}else{
			redirect(site_url('/signin-form'));
		}
	}

	function viewProfile($username){
		$user = $this->userModel->getUserByUserName($username);
		if ($user != null) {
			$result = $this->profileModel->getData($user[0]->PROFILE_ID);

			$data['isMine'] = $this->isMine($user[0]->USER_ID);
			if ($data['isMine'])
				$data['zeroRecordMsg'] = 'You Have No Stories yet';
			else
				$data['zeroRecordMsg'] = 'This User Has No Stories yet';

			$data['name'] = ($result[0]->DISPLAY_NAME != null)?$result[0]->DISPLAY_NAME:$username;
			$data['username'] = $username;
			$data['age'] = ($result[0]->BIRTH_DATE != null)?calculateDate($result[0]->BIRTH_DATE):"-";
			$data['gender'] = ($result[0]->GENDER != null)?$result[0]->GENDER:"-";
			$data['date_created'] = $user[0]->DATE_CREATED;
			
			$data['genre_list'] = $this->genreModel->getGenres();

			//get story data
			$story = $this->storyModel->getStoryByUserID($user[0]->USER_ID);
			$data['row'] = renderCardStory($story);

			$data['page_title'] = $this->page_title;
			$this->load->view('profiles/profileView',$data);
		}else{
			echo "user not found";
		}
	}

	// Function to render edit form of user profile
	function editForm(){
		//get user profile data here;
		if(isset($this->session->userid)){
			$result = $this->profileModel->getData($this->session->profileid);

			$data['name'] = $result[0]->DISPLAY_NAME;
			$data['date'] = $result[0]->BIRTH_DATE;
			$data['gender'] = $result[0]->GENDER;
			$data['genre_list'] = $this->genreModel->getGenres();

			$data['page_title'] = "Edit ".$this->page_title;
			$this->load->view('profiles/editProfileView',$data);
		}else{
			redirect(site_url('/signin-form'));
		}
	}

	function editProcess(){
		if($this->input->post('uName') != null){
			$data = array();
			$config['upload_path'] = "./assets/image/";
			$config['allowed_types'] ='gif|jpg|jpeg|png|PNG';
			$config['file_name'] = "profile_".$this->session->username;
			$config['overwrite'] = true;

			$this->load->library('upload',$config);

			$name = $this->input->post('displayName');
			$birth = $this->input->post('birth');
			$gender = $this->input->post('gender');

			if( $name != null)
				$data['DISPLAY_NAME'] = $name;
			if ($birth != null)
				$data['BIRTH_DATE'] = $birth;
			if ($gender)
				$data['GENDER'] = $gender;
			$imageupload = $this->upload->do_upload('image');
			// var_dump($imageupload);
			if ($imageupload) {
				$data['PROFILE_IMAGE'] = $this->upload->data('file_name');
			}else{
				echo "<script type='text/javascript'>alert('".$this->upload->display_errors('', '').
					  "');location='".site_url('/editProfile')."';</script>";
			}
			$result = $this->profileModel->updateProfile($this->session->profileid,$data);

			if ($result) {
				if($data['PROFILE_IMAGE'] != null)
					$this->session->image = base_url("assets/image/".$data['PROFILE_IMAGE']);
				if( $name != null)
					$this->session->display = $name;
				redirect(site_url('/profile'));
			}
		}else{
			redirect(site_url('/signin-form'));
		}
	}

	function isMine($userid){
		return $userid == $this->session->userid;
	}
}

 ?>