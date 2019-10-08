
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/Login/css/main.css">
<!--===============================================================================================-->
<link rel="icon" href="<?php echo base_url()?>assets/manual/img/LogoDapurSunda.png" type="image/png/x-icon" sizes="360x360">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background:url(../images/bg-01.jpg)">
					<span class="login100-form-title-1">
						Dapur Sunda Bu Yuyu <br>Sign In
					</span>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- <h1>List Menu</h1> -->
						<?php if ($this->session->flashdata('salah')): ?>
						<div class="alert alert-danger alert-dismissible" id="alert" role="alert">
							<p class="text-center"><strong><?php echo $this->session->flashdata('salah')?></strong></p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<form class="login100-form validate-form" action="<?php echo base_url('login/login_auth')?>" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url()?>assets/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url()?>assets/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url()?>assets/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>