
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form method="post" action="<?= base_url('index.php/signup') ?>">
          	<div class="modal-header">
                <h5 class="modal-title" id="modalLabel_1">Register Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
	      	
	      	<div class="modal-body">
      			<div class="form-group">
	      		    <label for="username">Username</label>
	      		    <input class="form-control" type="text" name="username" id="username" required>
	      		</div>

	      		<div class="form-group">
	      			<label for="password">Password</label>
	      			<input class="form-control" type="password" name="password" id="password" required>
	      		</div>

	      		<input type="text" name="submit" value="submit" hidden>
	      	</div>

	        <div class="modal-footer">
	        	<div class="inline-form">
	        		<button type="submit" class="btn btn-lg btn-warning">Sign Up!</button>
	        		<button type="button" class="btn btn-lg btn-danger" data-dismiss="modal">Cancel</button>
	        	</div>
	        </div>
	      </form>
      </div>
  </div>
</div>