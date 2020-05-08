<nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark">
	<div class="container">
		<!-- <div class="navbar-header"> -->
			<a class="navbar-brand" href="<?= base_url() ?>">
			    <img src="<?= base_url('assets/image/logo3.png') ?>" height="40" alt="">
			</a>

			<ul class="navbar-nav mr-auto">
			  <li class="nav-item dropdown">
			    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      Categories
			    </a>
			    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			    	<a class="dropdown-item" href="<?= site_url('/story/discover/all') ?>">
			    		All
			    	</a>
			    	<?php foreach ($genre_list as $value) { ?>
			    		<a class="dropdown-item" href="<?= site_url('/story/discover/'.$value->GENRE_ID) ?>">
			    			<?= $value->GENRE_NAME ?>
		    			</a>		
			    	<?php } ?><!-- 
			      <div class="dropdown-divider"></div>
			      <a class="dropdown-item" href="#">Pilihan Editor</a>
			      <a class="dropdown-item" href="#">Best to Read</a> -->
			    </div>
			  </li>

			  <!-- <li class="nav-item dropdown">
			    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      Community
			    </a>
			    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			      <a class="dropdown-item" href="#">Writer</a>
			      <a class="dropdown-item" href="#">Best-Recommendation</a>
			    </div>
			  </li> -->
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url("/favorite") ?>">Favorites</a>
				</li>
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link" href="" id="createNavbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span>Stories</span>
					</a>
					<div class="dropdown-menu" aria-labelledby="createNavbar">
						<a class="dropdown-item" href="<?= site_url("/new-story") ?>">New Story</a>
						<a class="dropdown-item" href="<?= site_url("/story/discover/my") ?>">My Story </a>
					</div>
				</li>
				<li class="dropdown nav-item">
					<a class="dropdown-toggle nav-link" href="#" id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="avatar avatar-sm">
							<img src="<?= $_SESSION['image'] ?>" width="25" height="25">
						</div>
						<span><?= $_SESSION['display'] ?></span>
					</a>
					<div class="dropdown-menu" aria-labelledby="profile-dropdown">
						<a class="dropdown-item" href="<?= site_url("/profile") ?>">profile</a>
						<a class="dropdown-item" href="<?= site_url("/signout") ?>">logout</a>
					</div>
				</li>
			</ul>
		<!-- </div> -->
	</div>
</nav>