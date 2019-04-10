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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .navbar {
      background-color: #eee;
      border-bottom: 4px solid #ff6600;
    }
    .it {
      color: #ff6600;
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

      <ul class="nav navbar-nav navbar-right" style="margin-left: 10px;">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="color: #ff6600;" href="<?php echo base_url() ?>login"><?php echo $this->session->userdata('username'); ?></a>
          <div class="dropdown-menu" aria-labelledby="themes">
            <a class="dropdown-item" href="<?php echo base_url(); ?>Login/view_profile"><span class="ni ni-circle-08"></span> My Profile </a>
            <a class="dropdown-item" href="<?php echo base_url(); ?>Items/my_cart"><span class="ni ni-cart"></span> Cart </a>
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