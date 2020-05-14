<?php require_once "html_parts/html_head.php" ?>


<?php require_once "html_parts/navbar.php" ?>
<div class="featured-story mt-4 mb-3">

	<div class="container">

		<section class="Recom">
			<h3 class="text-white">Our Recommendation</h3>
			<div class="row" style="margin-top: 30px;">
	          	<?php
	          		foreach ($recom as $value) {
						echo $value;
					}
				?>
			</div>
		</section>

		<section class="new" style="margin-top: 50px;">
			<h3 class="text-white">New Stories</h3>
			<div class="row" style="margin-top: 30px;">
	          	<?php
	          		foreach ($new as $value) {
						echo $value;
					}
				?>
			</div>
		</section>

	</div>

</div>

<script type="text/javascript">
	$(".clickable-row").click(function() {
	    window.location = $(this).data("href");
	});
</script>

<?php require_once "html_parts/html_foot.php" ?>