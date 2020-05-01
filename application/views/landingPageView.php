<?php require_once "html_parts/html_head.php" ?>
<?php require_once "html_parts/navhome.php" ?>


<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-6" style="margin-top: 100px; ">
				<h2>Monogatari</h2>
				<p>Platform bagi penulis untuk menerbitkan karyanya dan juga bagi pembaca yang suka membaca tanpa halangan apapun</p>

				<button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#register">Let's Read!</button>
			</div>

			<div class="col-6">
					<img src="<?= base_url("assets/image/img.jpg") ?>" class="pict">
			</div>
		</div>
	</div>
</section>


<section class="tools">
	<div class="container">
		<div class="row">
			<div class="col-4">
				
			</div>

			<div class="col-4">
				
			</div>

			<div class="col-4">
				
			</div>
		</div>
	</div>
</section>








<?php require_once "modals/registerModal.php" ?>

<?php require_once "html_parts/html_foot.php" ?>