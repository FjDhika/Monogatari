<?php 

/**
 * This class is Chapter Model Class
 * it will manage the chapter database
 */
class chapterModel extends CI_Model
{
	
	function __construct(){
		parent::__construct();
	}

	function insertChapter($storyid,$chapterid,$title,$content,$status){

		$data = array(	'STORY_ID' => $storyid,
						'CHAPTER_ID' => $chapterid,
						'CHAPTER_TITLE' => $title,
						'CHAPTER_CONTENT' => $content,
						'CHAPTER_STATUS' => $status);
		
		return $this->db->insert('chapters',$data);

	}

	function updateChapter($storyid,$chapterid,$title,$content,$status){

		$data = array(	'STORY_ID' => $storyid,
						'CHAPTER_ID' => $chapterid,
						'CHAPTER_TITLE' => $title,
						'CHAPTER_CONTENT' => $content,
						'CHAPTER_STATUS' => $status);
		
		return $this->db->replace('chapters',$data);

	}

	function deleteChapter($chapterid){
		return $this->db->delete('chapters',array('CHAPTER_ID' => $chapterid));
	}

	function deleteChapterByStoryID($storyid){
		return $this->db->delete('chapters',array('STORY_ID' => $storyid));
	}

	function getChapterByID($chapterid){
		// $chapter = $this->db->get_where('chapters',array('CHAPTER_ID'=>$chapterid))
		// 				->result();
		$chapter = $this->db
						->select('USER_ID, chapters.STORY_ID, CHAPTER_ID, CHAPTER_TITLE, CHAPTER_CONTENT, CHAPTER_STATUS')
						->from('chapters')
						->join('stories','chapters.STORY_ID = stories.STORY_ID and CHAPTER_ID = '. "'$chapterid'")
						->get()
						->result();
		return @$chapter[0];
	}

	function getChapterByStoryID($storyid){
		$chapter = $this->db->get_where('chapters',array('STORY_ID'=>$storyid))
						->result();
		return $chapter;
	}

	function getChapterTotal($storyid){
        $result = $this->db->select("COUNT(*) as num")
        		 		   ->where('STORY_ID',$storyid)
        		 		   ->get("chapters")
        		 		   ->row();
        if(isset($result)) return $result->num;
        return 0;
	}
}

 ?>