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

	function getAllStory(){
		return $this->db->get('stories')->result();

	}

	function getStoryByUserID($userid){
		$story = $this->db->get_where('stories',array('USER_ID'=>$userid))
						->result();
		return $story;
	}

	function getStoryByGenreID($genreid){
		$sql = 'select username,STORY_TITLE, STORY_ID, COVER from stories JOIN users ON stories.USER_ID = users.USER_ID and stories.STORY_ID in ( select STORY_ID from story_genres WHERE GENRE_ID = ?)';
		return $this->db->query($sql,array($genreid))->result();
	}

	function getRecommend($jumlah){
		$sql = 'select STORY_TITLE, fav.STORY_ID, COVER, jumlah from stories
		join (select STORY_ID, count(story_id) as jumlah from favorites GROUP BY STORY_ID) as fav
		on stories.STORY_ID = fav.STORY_ID ORDER BY `fav`.`jumlah`  DESC limit 0,'.$jumlah;

		return $this->db->query($sql)->result();
	}
}

 ?>