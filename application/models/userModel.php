<?php 

/**
 * this class define what will you do with user table
 * everything related to USERS and USERS_TABLE goes here
 */
class userModel extends CI_Model
{
	
	function __construct(){
		parent::__construct();
	}

	//function to get auth, it return user id and profile id
	// @params $username is new username, $passwor is new password
	function getAuth($username,$password){
		$data = array('username'=>$username,
					  'password'=>$password);
		$user = $this->db->select('user_id,profile_id,username')
						 ->from('users')
						 ->where($data);
		$result = $user->get()->result();

		return $result;
	}

	function getUser($userid){
		return $this->db->get_where('users',array('USER_ID' => $userid))
						->result();
	}

	function getUserByUserName($username){
		return $this->db->get_where('users',array('USERNAME' => $username))
						->result();
	}

	// function to add user(register), it return boolean (register success or not)
	// @params $username is new username, $passwor is new password
	// @params $date is date user register
	function addUser($username,$password,$date){
		$uuidProfile = uniqid();
		$uuidUser = uniqid();
		$data=array('username'=>$username,
					'password'=>$password,
					'user_id'=>$uuidUser,
					'date_created'=>$date);

		$validate = $this->validateRegistration($username,$uuidUser,$uuidProfile);

		if ($validate) {
			$this->db->insert('users',$data);
			$this->db->insert('users_profile',array('user_id'=>$uuidUser,
													'profile_id'=>$uuidProfile));
			$this->db->update('users',array('profile_id'=>$uuidProfile),"user_id = '$uuidUser'");

			return true;
		}else{
			return false;
		}
	}

	private function validateRegistration($username,$userid,$profileid){
		$this->db->or_where(array('username'=>$username,'user_id'=>$userid));
		$user = $this->db->select('*')
						 ->get('users')
						 ->result();
		$profile = $this->db->get_where('users_profile',array('profile_id'=>$profileid))
							->result();

		return sizeof($user) == 0 && sizeof($profile) == 0;
	}
}

 ?>