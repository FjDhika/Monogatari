<?php 

/**
 * this class define what will you do with user profile table
 */
class userProfileModel extends CI_Model
{
	
	function __construct(){
		parent::__construct();
	}

	function getData($profileid){
		return $this->db->select("DISPLAY_NAME, BIRTH_DATE, GENDER")
						->from('users_profile')
						->where(array('profile_id'=>$profileid))
						->get()
						->result();
	}
}

 ?>