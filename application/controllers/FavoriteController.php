<?php 

/**
 * 
 */
class FavoriteController extends CI_Controller
{
	
	private $page_title = "Favorite - Monogatari"; 
	function __construct(){
		parent::__construct();
		$this->load->helper('renderTable');
		$this->load->model('favoriteModel');
		$this->load->model('genreModel');
	}

	function index($id){
		$data['page_title'] = $this->page_title;

		//check sudah ada di favorite
		// jika sudah hapus dr favorite, jika tidak tambah difavorite
		if ($this->favoriteModel->checkFavorite($id,$this->session->userid)) {
			$result = $this->favoriteModel->deleteFavorite($id,$this->session->userid);
			if($result)
				echo "<script type='text/javascript'>alert('delete from favorite sucess');"
					  ."window.history.back();</script>";
			else
				echo "<script type='text/javascript'>alert('delete from favorite failed');"
					  ."window.history.back();</script>";
		}else{
			// tambah di favorite
			$result = $this->favoriteModel->addFavorite($id,$this->session->userid);
			if($result)
				echo "<script type='text/javascript'>alert('added to favorite sucess');"
					  ."window.history.back();</script>";
			else
				echo "<script type='text/javascript'>alert('added to favorite failed');"
					  ."window.history.back();</script>";
		}

		// $data['row'] = renderCardStory($story);
		// $this->load->view('story/browseStory',$data);
	}

	function pageFavorite(){

		$data['page_title'] = $this->page_title;
		$data['genre_list'] = $this->genreModel->getGenres();
		$data['zeroRecordMsg'] = 'No Favorites yet';

		$story = $this->favoriteModel->getFavorite($this->session->userid);
		$data['row'] = renderCardStory($story);
		$this->load->view('story/browseStory',$data);
		
	}
}

 ?>