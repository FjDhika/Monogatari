<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<?php require_once APPPATH."views/html_parts/storyNavbar.php" ?>

<?php 
	if (@$story[0] != null)
		$link = site_url('story/edit/proses/'.$story[0]->STORY_ID);
	else
		$link = site_url('new-story/proses');

?>

<div class="container" style="margin-top: 12px;">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12">
			<label for="image">
				<img class="image-placeholder" src=" <?=(@$story[0]->COVER != null)? base_url('/assets/image/cover/'.$story[0]->COVER): "#";?> " alt="cerita tak berjudul" height="256">
			</label>
		</div>
		<div class="col-lg-8 col-lg-offset-1 col-sm-12 col-md-8 col-md-offset-1">
			
			<div class="card">
				<div class="card-body">
					<form method="post" enctype="multipart/form-data" action="<?=$link?>" id="newStoryForm">
						<div class="form-group">
						    <label for="title">Title</label>
						    <input class="form-control" type="text" name="Judul" id="Judul" value="<?=(@$story[0]->STORY_TITLE != null)? $story[0]->STORY_TITLE: ""?>" required>
						</div>
						<input type="file" name="image" id="image" hidden>
						<div class="form-group">
							<label for="Genre"> Genre </label>
							<select multiple class="selectpicker form-control form-control-sm" data-live-search="true" name="Genre[]" id="Genre" required>
								<?php foreach ($genre as $key => $value) { ?>
									<option value="<?= $value->GENRE_ID ?>" 
									<?=(@$genres[$key]->GENRE_NAME == $value->GENRE_NAME)?"selected":""?> >
										<?= $value->GENRE_NAME ?>
									</option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label for="sinopsis">Synopsis</label>
							<textarea class="form-control" name="sinopsis" id="sinopsis" rows="10" aria-describedby="sinopsis-help"required /><?=(@$story[0]->SYNOPSIS != null)? $story[0]->SYNOPSIS:""?></textarea>
							<small id="sinopsis-help" class="form-text text-muted">*Max 500 character</small>
						</div>
						<input type="text" name="submit" value="submit" hidden>
						<button type="submit" id="submit" hidden></button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	
	function display(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('.image-placeholder').attr('src',e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$('#image').change(function(){
		display(this);
	});

	$('#Judul').change(function(){
		text = ($('#Judul').val()== '')?"Untitled Story":$('#Judul').val();
		console.log(text);
		$('#story-title').html(text);
	});

	$('#next').click(function(){
		console.log('submit');
		$('#submit').click();
	});

	$('.selectpicker').selectpicker();
</script>

<?php require_once APPPATH."views/html_parts/html_foot.php" ?>