<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<?php require_once APPPATH."views/html_parts/navbar.php" ?>

<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div style="float: right;" >
						<a href="<?= site_url("chapter/edit/$chapter->CHAPTER_ID") ?>" class="btn btn-orange"><span>edit</span></a>
						<a href="<?= site_url("chapter/delete/$chapter->CHAPTER_ID") ?>" class="btn btn-danger"><span>delete</span></a>
					</div>
					<div id="title" style="text-align: center; margin-bottom: 35px; text-decoration: underline;">
						<h3><?= $chapter->CHAPTER_TITLE ?></h3>
					</div>
					<div id="content"><?= $chapter->CHAPTER_CONTENT ?></div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php require_once APPPATH."views/html_parts/html_foot.php" ?>