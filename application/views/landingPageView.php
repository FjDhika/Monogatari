<?php require_once "html_parts/html_head.php" ?>
<?php require_once "html_parts/navhome.php" ?>


<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-6" style="margin-top: 80px; ">
				<h2>Monogatari</h2>
				<p>A platform for writers to publish their work and also for readers who like to read without any obstruction</p>

				<button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#register">Let's Read!</button>
			</div>

			<div class="col-6">
					<img src="<?= base_url("assets/image/book.png") ?>" class="pict"> 
			</div>
		</div>
	</div>
</section>


<section class="tools">
	<div class="container">

			<h3>"Things You Can Do with Monogatari"</h3>

		<div class="row">

			<div class="col-md-4">
				<img src="<?= base_url("assets/image/read.png") ?>">
				<h2>1. Reading</h2>
				<p>You can read any book with many categories anywhere anytime without worries</p>
			</div>

			<div class="col-md-4">
				<img src="<?= base_url("assets/image/write.png") ?>">
				<h2>2. Writing</h2>
				<p>Share your creation to the world easily and start your own career as a writer, and you can go to public with your own creation</p>
			</div>

			<div class="col-md-4">
				<img src="<?= base_url("assets/image/share.png") ?>">
				<h2>3. Sharing</h2>
				<p>Sharing the story that makes your heart puonding to someone else, will make you satisfied. You can recommended and put in your favorite book in your own library also keep reading it as much as you want </p>
			</div>
		</div>
	</div>
</section>

<section class="book">
	<div class="container">

		<h3>Our Recommendation</h3>

		<div class="row">
          	<?php
          		foreach ($row as $value) {
					echo $value;
				}
			?>
		</div>
	</div>
</section>



<script type="text/javascript">
	$(".clickable-row").click(function() {
	    window.location = $(this).data("href");
	});
</script>


<?php require_once "modals/registerModal.php" ?>

<?php require_once "html_parts/html_foot.php" ?>