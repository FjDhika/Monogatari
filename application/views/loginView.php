<?php require_once "html_parts/html_head.php" ?>

<!-- Bodies goes here -->
<h5>This is <?= $page_title ?> page</h5>
<h5>here is your user id : <?= $this->session->userid ?></h5>
<h5>here is your profile id : <?= $this->session->profileid ?></h5>

<?php require_once "html_parts/html_foot.php" ?>