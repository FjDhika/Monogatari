<?php require_once APPPATH."views/html_parts/html_head.php" ?>
<?php require_once APPPATH."views/html_parts/navbar.php" ?>

<div class="container" style="margin-top: 30px">
	<div class="col-sm-6 col-md-5 mx-auto">
		<div class="card">
			<div class="card-body">
				<form method="post" enctype="multipart/form-data" action="<?= site_url('/editProses') ?>" id="editprofile">
					<div class="form-group" style="margin-bottom: 30px;margin-left: -20px;">
						<div class="avatar avatar-profile  mx-auto">
							<label for="image">
								<img id="profileImage" width="128" height="128" src="<?= $_SESSION['image'] ?>" aria-hidden="true" alt="<?=$name?>" >
							</label>
						</div>
					</div>
					<input type="file" name="image" id="image" hidden>
					<div class="form-group">
						<label for="uName">username</label>
						<input type="text" class="form-control" name="uName" id="uName" value="<?= $_SESSION['username'] ?>" readonly>
					</div>

					<div class="form-group">
						<label for="displayName">Name</label>
						<input type="text" class="form-control" name="displayName" id="displayName" value="<?= $name ?>">
					</div>

					<div class="form-group">
						<label for="birth">Birth</label>
						<input type="text" class="form-control" name="birth" id="birth" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?= $date ?>">
					</div>

					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="form-control" id="gender" name="gender">
							<?php 
								$genders = array('Male','Female');
								foreach ($genders as $value) {
									if($gender == $value)
										echo "<option value=".$value." selected>".$value."</option>";
									else
										echo "<option value=".$value.">".$value."</option>";
								}
							 ?>
						</select>
					</div>

					<button class="btn btn-orange" type="submit">
						<span>submit</span>
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function display(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#profileImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$('#image').change(function(){
		display(this);
	});

</script>
<?php require_once APPPATH."views/html_parts/html_foot.php" ?>