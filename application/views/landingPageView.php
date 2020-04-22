<?php require_once "html_parts/html_head.php" ?>
<?php require_once "html_parts/navhome.php" ?>

<div class="container">
	<button type="button" class="btn btn-lg btn-block btn-outline-warning" data-toggle="modal" data-target="#register">Register</button>

	<button type="button" class="btn btn-lg btn-block btn-outline-primary" data-toggle="modal" data-target="#login">Login</button>
</div>

<?php require_once "modals/registerModal.php" ?>
<?php require_once "modals/loginModal.php" ?>

<?php require_once "html_parts/html_foot.php" ?>