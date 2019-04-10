<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4> Change Password </h4>
			</div>

			<div class="card-body">
				<?= $data_error; ?></i>
				<?php echo form_open_multipart('Login/update_password'); ?>
					<div class="row">
						<div class="col-6">
							<?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
							<label> Current Password </label>
							<div class="input-group mb-3">
  								<input type="text" class="form-control" placeholder="Please enter your current password" name="password" id="inputPassword">
  								<div class="input-group-append">
   	 								<button class="btn btn-outline-secondary" type="button"><span class="ni ni-key-25"></span></button>
 								</div>
							</div>
							<?php echo form_error('new_password', '<div class="text-danger">', '</div>'); ?>
							<label> New Password </label>
							<div class="input-group mb-3">
  								<input type="text" class="form-control" placeholder="Please make your password unique with special character" name="new_password">
  								<div class="input-group-append">
   	 								<button class="btn btn-outline-secondary" type="button"><span class="ni ni-key-25"></span></button>
 								</div>
							</div>

							<?php echo form_error('retype_password', '<div class="text-danger">', '</div>'); ?>
							<label> Retype Password </label>
							<div class="input-group mb-3">
  								<input type="text" class="form-control" placeholder="Please retype your new password" name="retype_password">
  								<div class="input-group-append">
   	 								<button class="btn btn-outline-secondary" type="button"><span class="ni ni-key-25"></span></button>
 								</div>
							</div>

							<div class="form-group">
								<button class="btn btn-danger" name="change_password" style="background-color: #ff6600; border: 0px;"> Change Password </button>
							</div>
							<?php echo form_close(); ?>
						</div>	
					</div>		
				</form>
			</div>
		</div>
	</div>
</div>