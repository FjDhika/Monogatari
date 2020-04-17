<?php 

/**
 * 
 */
class genreModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function getGenres(){
		return $this->db->get('genres')->result();
	}

	function getGenreName($genreids){
		return $this->db->select('GENRE_NAME')
						->from('genres')
						->or_where_in($genreids)
						->get()
						->result();
	}
}

 ?>