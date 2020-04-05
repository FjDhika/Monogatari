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
		$user = $this->db->select('user_id,profile_id')
						 ->from('users')
						 ->where($data);
		$result = $user->get()->result();

		return $result;
	}

	//function to get userProfile, it return profile data
	// @params $id is user id
	function getUserProfile($id){

	}

	// function to add user(register), it return boolean
	// @params $username is new username, $passwor is new password
	// @params $date is date user register
	function addUser($username,$password,$date){
		$uuidProfile = uniqid();
		$uuidUser = uniqid();
		$data=array('username'=>$username,
					'password'=>$password,
					'user_id'=>$uuidUser,
					'profile_id'=>$uuidProfile,
					'date_created'=>$date);

		$this->db->insert('users',$data);
		$this->db->insert('users_profile',array('user_id'=>$uuidUser,
												'profile_id'=>$uuidProfile));
	}
}

 ?>