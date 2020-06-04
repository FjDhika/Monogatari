<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="<?= base_url('assets/image/logo3.png'); ?>" height="40" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php foreach ($genre_list as $value) { ?>
            <a class="dropdown-item" href="<?= site_url('/story/discover/'.$value->GENRE_ID) ?>">
              <?= $value->GENRE_NAME ?>
            </a>   
          <?php } ?>
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

    <!-- <div class="search">
      <input class="search-text" type="text" name="" placeholder="Search..">
      <a class="search-btn" href="#"><i class="fa fa-search"></i></a>
    </div> -->

    <a class="btn btn-outline-warning" href="<?= site_url("/signin-form") ?>" role="button">Sign-In!</a>
  </div>
</nav>