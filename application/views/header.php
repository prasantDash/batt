<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Theme Made By www.w3schools.com -->
	<title>Pentity</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url("assets/css/header.css") ?>" rel="stylesheet" type="text/css">
	
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<a class="navbar-brand" href=<?php echo base_url(); ?> >Logo</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href=<?php echo base_url().'Aboutus'; ?> >ABOUT</a></li>
				<li><a href=<?php echo base_url().'Service'; ?>>SERVICES</a></li>
				<li><a href=<?php echo base_url().'Contactus'; ?>>CONTACT</a></li>
				<?php
				if(isset($this->session->get_userdata()['userData'])){
					echo '<li><a href="'.base_url().'Login/logout">LOGOUT</a></li>';
				}else{
					echo '<li><a href="'.base_url().'Login">LOGIN</a></li>';
				}
				?>				
			</ul>
		</div>
	</div>
</nav>