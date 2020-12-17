
<!DOCTYPE html>
<html lang="en">
<head>
	<title>LABKOM FMIPA UNS | Admin | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-90 p-b-30">
				<form class="login100-form validate-form" action="<?= base_url('login') ?>" method="post">
					<span class="login100-form-title p-b-40">
					Sistem Informasi LABKOM FMIPA UNS
          			</span>
				<?php
				if ($this->session->flashdata('sukses')) {
					echo '<h5 class="text-warning" style="margin: 10px 20px;">' . $this->session->flashdata('sukses').'</h5>';
				}
				echo validation_errors('<p class="text-warning" style="margin: 10px 20px;">','</p>') ?>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter id_admin: ex@abc.xyz">
						<input class="input100" type="text" name="id_admin" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-20" data-validate = "Please enter password">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
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
	<script src="<?= base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets/login/js/main.js"></script>

</body>
</html>
