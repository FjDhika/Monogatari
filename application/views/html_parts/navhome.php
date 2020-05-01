<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="assets/image/logo3.png" height="40" alt="">
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
          <a class="dropdown-item" href="#">Acak</a>
          <a class="dropdown-item" href="#">Fantasi</a>
          <a class="dropdown-item" href="#">Fiksi</a>
          <a class="dropdown-item" href="#">Horor</a>
          <a class="dropdown-item" href="#">Humor</a>
          <a class="dropdown-item" href="#">Misteri</a>
          <a class="dropdown-item" href="#">Non - Fiksi</a>
          <a class="dropdown-item" href="#">Roman</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Pilihan Editor</a>
          <a class="dropdown-item" href="#">Best to Read</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Community
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Writer</a>
          <a class="dropdown-item" href="#">Best-Recommendation</a>
        </div>
      </li>
    </ul>

    <div class="search">
      <input class="search-text" type="text" name="" placeholder="Search..">
      <a class="search-btn" href="#"><i class="fa fa-search"></i></a>
    </div>

    <a class="btn btn-outline-info" href="<?= site_url("/signin-form") ?>" role="button">Sign-In!</a>
  </div>
</nav>