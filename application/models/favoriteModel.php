<?php 

/**
 * 
 */
class FavoriteModel extends CI_Model
{
	
	function __construct(){
		parent::__construct();
	}

	function addFavorite($storyid,$userid){
		$id = uniqid();
		$data = array('USER_ID'=>$userid, 
					  'STORY_ID'=>$storyid,
					  'FAVORITE_ID' => $id);
		return $this->db->insert('favorites',$data);
	}

	function deleteFavorite($storyid,$userid){
		return $this->db->insert('favorites',array('USER_ID'=>$userid, 'STORY_ID'=>$storyid));
	}

	function getFavorite($userid){

	}

	function checkFavorite($storyid,$userid){
		return $this->db->get_where('favorites',array('USER_ID'=>$userid, 'STORY_ID'=>$storyid))
						->result();
	}
}

 ?>