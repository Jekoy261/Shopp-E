<!DOCTYPE html>
<html>
<head>
	<title> OrangeApps, Shopp'E. </title>
	<link href="<?php echo base_url(); ?>assets/images/logos/orange_apps.png" rel="shortcut icon">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/nucleo.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<style type="text/css">
  		body {
  			background-color: #fff;
  		}
  		.container{
        background-color: #eee;
  			border: 2px solid #ff6600;
  		}
  	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
	<a class="navbar-brand" href="#"><img class="imglogo" src="<?php echo base_url(); ?>assets/images/logos/orange_apps.png"></a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      	<span class="navbar-toggler-icon"></span>
    	</button>

  	<div class="collapse navbar-collapse">
   		<ul class="navbar-nav mr-auto">
   			<li class="nav-item active">
   				<a class="nav-link" style="color: #ff6600;" href="<?php echo base_url()?>"> Home <span class="sr-only">(current)</span></a>
   			</li>
        <li class="nav-item">
          <a class="nav-link" style="color: #ff6600;" href="<?php echo base_url() ?>items"> Items </a>
        </li>
   			<li class="nav-item">
   				<a class="nav-link" style="color: #ff6600;" href="<?php echo base_url() ?>categories"> Categories </a>
   			</li>
   		</ul>
   		<ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" style="color: #ff6600;" href="<?php echo base_url() ?>login"><span class="ni ni-key-25"></span> Login </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: #ff6600;" href="<?php echo base_url() ?>login/create_user"><span class="ni ni-circle-08"></span> Register </a>
        </li>
   		</ul>  
  	</div>
</nav>

<br>	
<br>
<br>
<br>
<br>
<br>
<div class="container shadow">
	<div class="row">
		<div class="col-l2">
			<div class="row">
				<div class="col-6">
					<br>
					<br>
					<br>
          <br>
          <br>
          <br>
					<a href="<?php echo base_url(); ?>"><img style="width: 98%;" src="<?php echo base_url(); ?>assets/images/logos/orange_apps2.png"></a>
					<h4 class="text-center" style="color: #ff6600; "> Shopp'E </h4>
				</div>
				<div class="col-6">
					<br>

					<h4 class="text-center"> Create An Account! </h4>
          <span class="text-success"><?=$data_success; ?></span>
          <?php echo form_open_multipart('Login/create_user'); ?>
          <div class="form-group">
            <input type="hidden" name="level" value="2">
          </div>

					<div class="form-group">
						<input type="text" autocomplete="no" class="form-control form-control-lg" style="border-radius: 0px;" placeholder="First Name" name="fname">
            <span class="text-danger"><?php echo form_error('fname'); ?></span>
					</div>

					<div class="form-group">
						<input type="text" autocomplete="no" class="form-control form-control-lg" style="border-radius: 0px;" placeholder="Last Name" name="lname">
            <span class="text-danger"><?php echo form_error('lname'); ?></span>
					</div>	
					
					<div class="form-group">
						<input type="email" autocomplete="no" class="form-control form-control-lg" style="border-radius: 0px;" placeholder="Email Address" name="email">
            <span class="text-danger"><?php echo form_error('email'); ?></span>
					</div>	

          <div class="form-group">
            <input type="number" autocomplete="no" class="form-control form-control-lg" style="border-radius: 0px;" placeholder="Mobile Number" name="mobile_number">
            <span class="text-danger"><?php echo form_error('mobile_number'); ?></span>
          </div>

          <div class="form-group">
            <input type="text" autocomplete="no" class="form-control form-control-lg" style="border-radius: 0px;" placeholder="Username" name="username">
            <span class="text-danger"><?php echo form_error('username'); ?></span>
          </div>
					
					<div class="form-group">
						<input type="password" class="form-control form-control-lg" style="border-radius: 0px;" placeholder="Password" name="password">
            <span class="text-danger"><?php echo form_error('password'); ?></span>
					</div>	

          <hr>

					<div class="text-center">
						<input type="submit" name="register" style="border-radius: 0px; background-color: #ff6600; color: #fff;" class="btn btn-danger btn-lg border-0" value="Register Account">
					</div>
          </form>
					
          <br>
				</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<br>
<br>

<footer id="main-footer" class="text-white" style="background-color: #fff;">
    <div class="container" style="background-color: #fff; border: 0px;">
        <div class="row text-center">
          <div class="col-md-12">
            <div class="col">
              <p class="text-center" style="font-weight: bold; font-family: Maiandra GD; margin-top: 14px; color: #000;">Copyright &copy; 2018 | Shopp'E</p>
            </div>
          </div>
        </div>
    </div>
</footer> 

</body>
</html>