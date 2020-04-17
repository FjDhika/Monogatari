<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<?php require_once APPPATH."views/html_parts/navbar.php" ?>

<div class="container" style="margin-top: 20px;">
	<div class="card">
		<div class="card-body row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<img class="image-placeholder" src="<?= base_url('/assets/image/cover/'.$story[0]->COVER) ?>" alt="cerita tak berjudul" height="256">
			</div>
			<div class="col-lg-9 col-sm-12 col-md-9">
				<div class="row">
					<div class="col-lg-11">
						<h5>Judul : <span><?= $story[0]->STORY_TITLE ?></span></h5>
						<h5>Genre : <span>
							<?php foreach ($genre as $value) {
								echo $value->GENRE_NAME." ";
							} ?>
						</span></h5>
					</div>
					<div class="col-lg-1">
						<button class="btn btn-orange btn-sm" style="height: 40px; float: right;">
							<span>edit</span>
						</button>
					</div>
				</div>
				
				<h5>Synopsis:</h5>
				<p><?= $story[0]->SYNOPSIS ?></p>
			</div>
		</div>
	</div>

	<h3 style="margin-top: 35px;">
		Chapter List
		<button class="btn btn-sm btn-primary" hidden><b>+ Add Chapter</b></button>
	</h3>
	<!-- TABLE Chapter -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<table class="table" style="margin-bottom: 0">
				<thead class="thead-light">
					<th scope="col">#</th>
					<th scope="col">Judul Chapter</th>
					<th scope="col">View</th>
					<th scope="col">Status</th>
					<th scope="col">Aksi</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
			<div class="card">
				<div class="card-body" style="text-align: center; background: rgba(0,0,0,0.1);">
					<button class="btn btn-orange btn-lg"> <span>+ Add Chapter</span> </button>
				</div>
			</div>
		</div>
	</div>

</div>

<?php require_once APPPATH."views/html_parts/html_foot.php" ?>