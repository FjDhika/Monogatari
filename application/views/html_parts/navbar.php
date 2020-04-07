<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
	<div class="container">
		<!-- <div class="navbar-header"> -->
			<a class="navbar-brand" href="">Monogatari</a>
			<ul class="navbar-nav ml-auto">
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link" href="#" id="createNavbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span>Write</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="createNavbar">
						<a class="dropdown-item" href="#">New Story</a>
						<a class="dropdown-item" href="#">My Story </a>
					</div>
				</li>
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link" href="#" id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="avatar avatar-sm">
							<img src="<?= base_url('assets/image/a.128.jpg') ?>" width="25" height="25">
						</div>
						<span>username</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="profile-dropdown">
						<a class="dropdown-item" href="<?= site_url("/profile") ?>">profile</a>
						<a class="dropdown-item" href="<?= site_url("/logout") ?>">logout</a>
					</div>
				</li>
			</ul>
		<!-- </div> -->
	</div>
</nav>