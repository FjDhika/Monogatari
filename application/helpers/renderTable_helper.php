<?php 

function renderCardStory($data){
	$row = array();
	if($data){
		foreach ($data as $key => $value) {
			$row[] = "<tr role='row' class='odd col-lg-3 col-md-4 col-sm-12 clickable-row'
					data-href='".site_url('story/'.$value->STORY_ID)."'>
					<td class='sorting_1'>
						<div class='card shadow'> 
							<img src='".base_url("assets/image/cover/$value->COVER")."' class='card-img-top'>
							<div class='card-body' style='text-align:center;'>
								<div class='card-text'>".$value->STORY_TITLE." </div>
							</div>
						</div>
					</td>
				</tr>";
		}
	}
	return $row;
}

// Helper to Render Recommended Storis
function renderCardRecom($data){
	$row = array();
	if($data){
		foreach ($data as $key => $value) {
			$row[] = "<div class='col-lg-3 col-md-4 col-sm-12 clickable-row'
					data-href='".site_url('story/'.$value->STORY_ID)."'>
						<div class='card shadow'> 
							<img src='".base_url("assets/image/cover/$value->COVER")."' class='card-img-top'>
							<div class='card-body' style='text-align:center;'>
								<div class='card-text'>".$value->STORY_TITLE." </div>
							</div>
						</div>
					</div>";
		}
	}
	return $row;
}

function renderCardDashboard($data){

	$row = array();
	if($data){
		foreach ($data as $key => $value) {
			$row[] = '<div class="col-lg-3 col-md-4 col-sm-12 clickable-row"
						data-href="'.site_url("story/".$value->STORY_ID).'">
						<div class="card shadow-sm">
							<img class="bg-placeholder-img card-img-top" src="'.base_url("assets/image/cover/$value->COVER").'" alt="" width="100%" height="225">
							<div class="card-body" style="text-align:center;padding:0;">
								<h4 class="card-header"> '.$value->STORY_TITLE.' </h4>
							</div>
						</div>
					</div>';
		}
	}
	return $row;
}

 ?>