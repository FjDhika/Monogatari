<?php 

/**
 * 
 */
class StoryModel extends CI_Model
{
	
	function __construct(){
		parent::__construct();
	}

	function insertStory($id,$title,$synopsis,$cover, $genres){

		$time = local_to_gmt(time());
		$now = mdate('%Y/%m/%d');
		$data = array(	'STORY_ID' => $id,
						'USER_ID' => $this->session->userid,
						'STORY_TITLE' => $title,
						'SYNOPSIS' => $synopsis,
						'COVER' => $cover,
						'DATE_ADDED' => $now,
						'DATE_UPDATED' => $now);
		
		$result = $this->db->insert('stories',$data);
		if($result){
			return $this->insertGenres($id,$genres);
		}

	}

	function updateStory($id,$title,$synopsis,$cover, $genres){

		$oldStoriesCover = $this->getStory($id);
		if(!isset($cover)){
			$cover = $oldStoriesCover[0]->COVER;
		}

		$time = local_to_gmt(time());
		$now = mdate('%Y/%m/%d');
		$data = array(	'STORY_ID' => $id,
						'USER_ID' => $this->session->userid,
						'STORY_TITLE' => $title,
						'SYNOPSIS' => $synopsis,
						'COVER' => $cover,
						'DATE_ADDED' => $now,
						'DATE_UPDATED' => $now);
		
		$result = $this->db->replace('stories',$data);
		if($result){
			return $this->updateGenres($id,$genres);
		}

	}

	function insertGenres($storyid,$genres){
		$data=array();
		foreach ($genres as $key => $value) {
			$data[$key] = array( 'STORY_ID' => $storyid, 'GENRE_ID' => $value);
		}
		return $this->db->insert_batch('story_genres',$data);
	}

	function updateGenres($storyid,$genres){
		$data=array();
		foreach ($genres as $key => $value) {
			$data[$key] = array( 'STORY_ID' => $storyid, 'GENRE_ID' => $value);
		}
		$this->db->where('STORY_ID',$storyid);
		$this->db->delete('story_genres');
		return $this->db->insert_batch('story_genres',$data);
	}

	function deleteStory($storyid){
		return $this->db->delete('stories',array('STORY_ID'=>$storyid));
	}

	function getStory($storyid){
		$story = $this->db->get_where('stories',array('STORY_ID'=>$storyid))
						->result();
		$story[0]->GENRE_ID = $this->db->select('GENRE_ID')
									   ->from('story_genres')
									   ->where(array('STORY_ID'=>$storyid))
									   ->get()->result();
		return $story;
	}

	function getStoryByUserID($userid){
		$story = $this->db->get_where('stories',array('USER_ID'=>$userid))
						->result();
		return $story;
	}
}

 ?>