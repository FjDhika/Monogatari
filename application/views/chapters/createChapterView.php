<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/summernote/summernote.css') ?>">
<?php require_once APPPATH."views/html_parts/storyNavbar.php" ?>

<div class="container" style="margin-top: 12px;">
	<div class="row">
		<div class="col-12">
			
			<div class="card">
				<div class="card-body">
					<form method="post" action="<?= $link ?>" id="newStoryForm">
						<div class="form-group">
						    <input class="form-control" type="text" placeholder="Chapter Title" name="Judul" id="Judul" value="<?= @$chapter->CHAPTER_TITLE ?>" required>
						</div>

						<div class="form-group">
							<textarea id="content" class="form-control" name="chapter_content" rows="18">
                                <?= @$chapter->CHAPTER_CONTENT ?>                     
                            </textarea>
						</div>
						<input type="text" name="submit" value="submit" hidden>
						<button type="submit" id="submit" hidden></button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript" src="<?= base_url('assets/plugins/summernote/summernote.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $('#content').summernote({
            height: "450px",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete : function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo site_url('chapter/tiny-mce-upload')?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#content').summernote("insertImage", url);
                },
                error: function(data) {
                	console.log('salah')
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {src : src},
                type: "POST",
                url: "<?php echo site_url('chapter/tiny-mce-delete')?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }
 
	});
</script>
<script type="text/javascript">
	
	
	$('#Judul').change(function(){
		text = ($('#Judul').val()== '')?"Untitled Chapter":$('#Judul').val();
		console.log(text);
		$('#story-title').html(text);
	});
	
	$('#next').click(function(){
		console.log('submit');
		$('#submit').click();
	});
</script>
<?php require_once APPPATH."views/html_parts/html_foot.php" ?>