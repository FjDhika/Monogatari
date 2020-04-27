<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<?php require_once APPPATH."views/html_parts/navbar.php" ?>
<style type="text/css">
#dt.dataTable.no-footer{
  border-bottom: unset;
}
#dt tbody td {
    display: block;
    border: unset;
}
#dt>tbody>tr>td{
  border-top: unset;
}
</style>

<div class="profile-layout">
	<?php if ($isMine): ?>
		<a class="btn btn-orange" id="edit" href="<?= site_url('/editProfile') ?>">
			<span class="fa fa-settings fa-wp-neutral-2" aria-hidden="true" style="font-size: 16px;"></span>
			<span>Edit Profile</span>
		</a>
	<?php endif ?>
	<header class="background background-lg" style="background-color: #7BA8C1;">
		<div class="avatar avatar-profile center-block">
			<img src="<?= $_SESSION['image'] ?>" aria-hidden="true" alt="<?=$name?>">
		</div>
		<div class="badges">
			<h1 class="profile-name h3" aria-label="<?=$name?>"><?= $name ?></h1>
		</div>
		<p id="alias" aria-label="also known as <?= $name ?>">@<?= $username ?></p><br>
	</header>
</div>

<div class="container" style="margin-top: 15px">
	<div class="row">
		<div class="card col-sm-3">
			<div class="card-body">
				<p>name : <?= $name ?></p>
				<p>age : <?= $age ?></p>
				<p>gender : <?= $gender ?></p>
				<p>member since : <?= $date_created ?></p>
			</div>
		</div>
		<div class="card col-sm-8" style="margin-left: 15px">
			<div class="card-body">
		        <table id="dt" class="table w-100">
		          <thead>
		            <tr>
		              <th>stories</th>
		            </tr>
		          </thead>
		          <tbody class="row">
		          	<?php foreach ($row as $value) {
								echo $value;
							} ?>
		          </tbody>
		        </table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$("#dt thead").hide();
var dt = $('#dt').DataTable({
	pageLength: 20,
		lengthChange: false,
 	processing: true,
 	language: {  
    	  paginate: {
              previous: "<",
              next: ">"
      	  },
      	  zeroRecords: '<?= $zeroRecordMsg ?>'
    },
});
$(".clickable-row").click(function() {
    window.location = $(this).data("href");
});
</script>

<?php require_once APPPATH."views/html_parts/html_foot.php" ?>