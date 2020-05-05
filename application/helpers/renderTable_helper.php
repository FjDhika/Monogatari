<?php 

function renderCardStory($data){
	$row = array();
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
	return $row;
}

 ?>