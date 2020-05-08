<?php require_once "html_parts/html_head.php" ?>

<div class="reg-card"><img src="<?= base_url("assets/image/logo3.png") ?>">
	<form method="post" action="<?= base_url('index.php/signup') ?>" enctype="multipart/form-data">

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="password" name="password" pattern=".{6,}" title="Password Minimal 6 Karakter" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" id="confirm_password" name="confirm_password" pattern=".{6,}" title="Password Minimal 6 Karakter" required>
			<small id="message"></small>
		</div>
		<div class="input-group">
			<button type="submit" class="btn-regis" name="regis">Register</button>
		</div>
		<input type="text" name="submit" value="submit" hidden>
		<div class="input-group">
			<a href="<?= base_url('index.php/signin') ?>" class="btn-sign" style="text-align: center;">Sign In</a>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('#password, #confirm_password').on('keyup', function () {
	  if ($('#password').val() == $('#confirm_password').val()) {
	    $('#message').html('Matching').css('color', 'green');
	  } else 
	    $('#message').html('Not Matching').css('color', 'red');
	});
</script>

<?php require_once "html_parts/html_foot.php" ?>