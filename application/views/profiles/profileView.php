<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<?php require_once APPPATH."views/html_parts/navbar.php" ?>

<div class="profile-layout">
	<a class="btn btn-orange" id="edit" href="<?= site_url('/editProfile') ?>">
		<span class="fa fa-settings fa-wp-neutral-2" aria-hidden="true" style="font-size: 16px;"></span>
		<span>Edit Profile</span>
	</a>
	<header class="background background-lg" style="background-color: #7BA8C1;">
		<div class="avatar avatar-profile center-block">
			<img src="<?= $_SESSION['image'] ?>" aria-hidden="true" alt="<?=$name?>">
		</div>
		<div class="badges">
			<h1 class="profile-name h3" aria-label="<?=$name?>"><?= $name ?></h1>
		</div>
		<p id="alias" aria-label="also known as <?= $name ?>">@<?= $_SESSION['username'] ?></p><br>
	</header>
</div>

<div class="container">
	<!-- content goes here -->
</div>

<?php require_once APPPATH."views/html_parts/html_foot.php" ?>


<!-- Kurang Edit View Setelah itu lanjut create cerita -->