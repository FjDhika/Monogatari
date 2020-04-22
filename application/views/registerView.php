<?php require_once "html_parts/html_head.php" ?>

<div class="reg-card"><img src="<?= base_url("assets/image/logo3.png") ?>">
			<form method="post" action="<?= base_url('index.php/signup') ?>" enctype="multipart/form-data">

				<div class="input-group">
					<label>Username</label>
					<input type="text" name="username" required>
				</div>
				<div class="input-group">
					<label>Password</label>
					<input type="password" name="password_1" pattern=".{6,}" title="Password Minimal 6 Karakter" required>
				</div>
				<div class="input-group">
					<label>Confirm password</label>
					<input type="password" name="password_2" pattern=".{6,}" title="Password Minimal 6 Karakter" required>
				</div>
				<div class="input-group">
					<button type="submit" class="btn-regis" name="regis">Register</button>
				</div>
				<div class="input-group">
					<a href="<?= base_url('index.php/signin') ?>" class="btn-sign" style="text-align: center;">Sign In</a>
				</div>
			</form>
		</div>

<?php require_once "html_parts/html_foot.php" ?>