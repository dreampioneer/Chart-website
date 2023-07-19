<?php

    require "./../controllers/BaseController.php"; 
      
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Email Verify</title>
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
                    <span class="login100-form-title p-b-49">Email Verify</span>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required" id="email_block">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" id="email" placeholder="Input your email address">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required" id="code_block" style="display: none;">
                        <span class="label-input100">Code</span>
                        <input class="input100" type="text" id="code" placeholder="Input verify code">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" onclick="send_code()" id="btn_send">Send Code</button>
                            <button class="login100-form-btn" onclick="send_verify()" id="btn_verify" style="display: none;" id="btn_verify">Verify</button>
                        </div>
                    </div>
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

        <script>
            const send_code = () => {
                const url = "sendcode.php";
                $("#email_block").attr("style", "display: none");
                $("#btn_send").attr("style", "display: none");

                $("#code_block").attr("style", "display: block");
                $("#btn_verify").attr("style", "display: block");
                $.post(url, {email: $("#email").val(), }, function(data, status) {
                    if(data == 'false') {
                        $("#email_block").attr("style", "display: block");
                        $("#btn_send").attr("style", "display: block");

                        $("#code_block").attr("style", "display: none");
                        $("#btn_verify").attr("style", "display: none");

                        window.alert('Sorry. Cannot send email verify code. Please try again.')
                    } else {
                        window.alert('Email verify code sent successfully. Please input code here.');
                    }
                });
            }

            const send_verify = () => {
                const url = "./actions/emailverify.php";
                $.post(url, {code: $("#code").val(), }, function(data, status) {
                    if(data == "false") {
                        window.alert("Email Verify Code is invalid. Please check again.");
                    } else {
                        window.location.href = './login.php';
                        // window.alert("Email verified successfully. You can reset password now.");
                    }
                });
            }
        </script>
	</body>
</html>