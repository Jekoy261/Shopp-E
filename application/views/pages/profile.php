<div class="row">
	<div class="col-4">
		<div class="card shadow">
			<div class="card-body">
					<div class="form-group text-center">
						<?php foreach ($users as $user): ?>
						<img class="img-thumbnail" height="200" src="<?php echo base_url(); ?>
						<?php if(empty($user['image'])) { ?>
						<?php echo "assets/images/profile/default_male_pic.png"; ?>
						<?php } else { ?>
						<?php echo $user['image']; ?>
						<?php } ?>">
						<?php endforeach; ?>
					</div>
					<?php echo form_open_multipart('Login/save_picture'); ?>

					<div class="form-group">
						<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
						<?php echo form_upload('pic'); ?>
					</div>
					<div class="form-group text-center">
						<?php echo form_submit('submit', 'Change Profile', 'class="btn btn-danger" style="background-color: #ff6600; border: 0;"' ); ?>
					</div>
			</div>
		</div>
	</div>

	<div class="col-8">
		<div class="card">
			<div class="card-header">
				<h4> My Account </h4>
			</div>

			<div class="card-body">
				<h5> USER INFORMATION </h5>
				<span class="text-success"><?=$data_success; ?></span>
				<?php foreach ($users as $user): ?>
					<?php echo form_open_multipart('Login/update_profile'); ?>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label> First Name </label>
									<input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
									<input type="text" class="form-control" name="fname" value="<?php echo $user['fname']; ?>">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label> Last Name</label>
									<input type="text" class="form-control" name="lname" value="<?php echo $user['lname']; ?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label> Username </label>
									<input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label> Mobile Number </label>
									<input type="number" class="form-control" name="mobile_number" value="<?php echo $user['mobile_number']; ?>">
								</div>
							</div>	
						</div>
						<hr>
						<div class="row">
							<div class="col-2">
								<button class="btn btn-success" name="update"> Update</button>
							</div>
						</div>
					</form>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<br>