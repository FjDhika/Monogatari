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
		return $this->db->delete('favorites',array('USER_ID'=>$userid, 'STORY_ID'=>$storyid));
	}

	function getFavorite($userid){
		$storyid = $this->db->select('STORY_ID')
							->where('USER_ID',$userid)
							->get('favorites')
							->result_array();
		if($storyid){
			$storyids = array();
			foreach ($storyid as $value) {
				$storyids[] = $value['STORY_ID'];
			}
			$story = $this->db->select('STORY_TITLE, STORY_ID, COVER')
							  ->where_in('STORY_ID',$storyids)
							  ->get('stories')
							  ->result();
			return $story;
		}

		return null;
	}

	function checkFavorite($storyid,$userid){
		return $this->db->get_where('favorites',array('USER_ID'=>$userid, 'STORY_ID'=>$storyid))
						->result();
	}
}

 ?>