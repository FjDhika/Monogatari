<?php require_once "html_parts/html_head.php" ?>

<!-- Bodies goes here -->
<!-- halaman login -->
<h1>Login Form</h1>
<form method="post" action="<?= base_url('index.php/signin') ?>">  	
	<div class="form-group">
	    <label for="username">Username</label>
	    <input class="form-control" type="text" name="username" id="username" required>
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input class="form-control" type="password" name="password" id="password" required>
	</div>
	<input type="text" name="submit" value="submit" hidden>
    <button type="submit" class="btn btn-lg btn-warning">Sign In!</button>
</form>
<?php require_once "html_parts/html_foot.php" ?>