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

	function getChapterByID($chapterid){
		$chapter = $this->db->get_where('chapters',array('CHAPTER_ID'=>$chapterid))
						->result();
		return @$chapter[0];
	}
}

 ?>