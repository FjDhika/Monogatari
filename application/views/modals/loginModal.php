
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form method="post" action="<?= base_url('index.php/signin') ?>">
          	<div class="modal-header">
                <a class="login" href="<?= base_url() ?>"><img src="<?= base_url("assets/image/logo3.png") ?>" height="50"></a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
	      	
	      	<div class="modal-body">
      			<div class="form-group">
	      		    <label for="username">Username</label>
	      		    <input class="form-control" type="text" name="username" id="username" placeholder="Enter Your Username" required>
	      		</div>

	      		<div class="form-group">
	      			<label for="password">Password</label>
	      			<input class="form-control" type="password" name="password" id="password" placeholder="Enter Your Password" required>
	      		</div>

	      		<input type="text" name="submit" value="submit" hidden>
	      	</div>

	        <div class="modal-footer">
	        	<div class="inline-form">
	        		<button type="submit" class="btn btn-lg btn-warning">Sign In!</button>
	        		<button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Cancel</button>
	        	</div>
	        </div>
	      </form>
      </div>
  </div>
</div>