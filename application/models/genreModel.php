<?php 

/**
 * 
 */
class genreModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function getGenres(){
		return $this->db->order_by('GENRE_ID')
						->get('genres')
						->result();
	}

	function getGenreName($genreids){
		return $this->db->select('GENRE_NAME')
						->from('genres')
						->or_where_in('GENRE_ID',$genreids)
					    ->order_by('GENRE_ID')
						->get()
						->result();
	}
}

 ?>