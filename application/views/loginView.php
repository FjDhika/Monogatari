<?php require_once "html_parts/html_head.php" ?>

<div class="login-card"> <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url("assets/image/logo3.png") ?>" height="50"></a>
            <p class="profile-name-card"> </p>

            <form class="form-signin" method="post" action="<?= base_url('index.php/signin') ?>">
                <input class="form-control" type="text" name="username" required placeholder="Username" autofocus id="username" />
                <input class="form-control" type="password" name="password" required placeholder="Password" id="password" />
                <input type="text" name="submit" value="submit" hidden>
                <button class="btn-sign" type="submit" name="login">Sign in</button>

            </form>

            <a href="forgot_password.php" class="forgot-password">Forgot your password?</a>
            <a href="<?= base_url('index.php/signup') ?>">Daftar</a>
        </div>
<?php require_once "html_parts/html_foot.php" ?>