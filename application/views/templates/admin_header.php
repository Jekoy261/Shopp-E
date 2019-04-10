<!DOCTYPE html>
<html>
<head>
	<title> Admin </title>
    <link href="<?php echo base_url(); ?>assets/images/logos/orange_apps.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/nucleo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style type="text/css">
    .navbar {
      background-color: #eee;
      border-bottom: 4px solid #ff6600;
      box-shadow: 0px 1px 10px 5px rgba(0,0,0,0.4);
    }
    .it {
      color: #ff6600;
    }
    .o-hidden {
      overflow: hidden !important;
    }
    .card-body-icon {
      position: absolute;
      z-index: 0;
      top: -1.25rem;
      right: -1rem;
      opacity: 0.4;
      font-size: 5rem;
      -webkit-transform: rotate(15deg);
      transform: rotate(15deg);

    } 
    .z-1 {
      z-index: 1;
    }
    .card:hover .icon{
      font-size: 100px;
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
  				  <a class="nav-link" style="color: #ff6600;" href="<?php echo base_url(); ?>admin/home"> Home <span class="sr-only">(current)</span> </a>
  			 </li>
        	<li class="nav-item">
          		<a class="nav-link" style="color: #ff6600;" href="<?php echo base_url() ?>categories/create"> Create Category </a>
        	</li>
          <li class="nav-item">
            <a class="nav-link" style="color: #ff6600;" style="color: #ff6600;" href="<?php echo base_url() ?>items/add_item"> Add Item </a>
          </li> 
  		</ul>

      <ul class="nav navbar-nav navbar-right" style="margin-right: 80px;">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color: #ff6600;" href="<?php echo base_url() ?>login"><?php echo ucfirst($this->session->userdata('username')); ?></a>
          <div class="dropdown-menu" aria-labelledby="themes">
            <?php echo '<a class="dropdown-item" href="'.base_url().'login/logout"><span class="ni ni-lock-circle-open"></span> Logout </a>'; ?>
          </div>
        </li>
      </ul>	
  	</div>	
</nav>

<br>
<br>
<br>
<br>
<div class="container">
