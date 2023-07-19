<?php
    require "./../controllers/BaseController.php";

    if($_SESSION['verify_status'] != "true") {
        Redirect('./fgpassword.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reset Password</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="./../assets/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./../assets/fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="./../assets/vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="./../assets/vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="./../assets/vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="./../assets/vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="./../assets/vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="./../assets/css/util.css">
		<link rel="stylesheet" type="text/css" href="./../assets/css/main.css">

	</head>
	<body>
		<div class="limiter">
			<div class="container-login100" style="background-image: url('./../assets/img/bg.jpg');">
				<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<form class="login100-form validate-form" action="./actions/reset.php" method="post">
						<span class="login100-form-title p-b-49">Reset Password</span>
						<div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" placeholder="Type your username">
							<span class="focus-input100" data-symbol="&#xf206;"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="password" placeholder="Type your password">
							<span class="focus-input100" data-symbol="&#xf190;"></span>
						</div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
							<span class="label-input100">Re-Password</span>
							<input class="input100" type="password" name="rpassword" placeholder="Type your password again">
							<span class="focus-input100" data-symbol="&#xf190;"></span>
						</div>

						<div class="row">
							<div class="col-6">
								<div class="text-left p-t-8 p-b-31">
								</div>
							</div>
							<div class="col-6">
								<div class="text-right p-t-8 p-b-31">
								</div>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="./../assets/vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="./../assets/vendor/animsition/js/animsition.min.js"></script>
		<script src="./../assets/vendor/bootstrap/js/popper.js"></script>
		<script src="./../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="./../assets/vendor/select2/select2.min.js"></script>
		<script src="./../assets/vendor/daterangepicker/moment.min.js"></script>
		<script src="./../assets/vendor/daterangepicker/daterangepicker.js"></script>
		<script src="./../assets/vendor/countdowntime/countdowntime.js"></script>
		<script src="./../assets/js/main.js"></script>
	</body>
</html>