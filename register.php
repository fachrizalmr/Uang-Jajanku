<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (name, username, email, password)
            VALUES (:name, :username, :email, :password)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":username" => $username,
        ":password" => $password,
        ":email" => $email
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  	<link rel="icon" href="index/img/sad.png" type="image/png">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="register/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="register/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="register/vendor/animate/animate.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="register/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="register/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="register/css/util.css">
  	<link rel="stylesheet" type="text/css" href="register/css/main.css">
  <!--===============================================================================================-->
</head>
<body>

  <div class="container-contact100">
		<div class="wrap-contact100">
				<form class="contact100-form validate-form" action="" method="post">
					<span class="contact100-form-title">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
            <span class="label-input100">Fullname</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
            <span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
            <span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>


          <div class="container-contact100-form-btn">
  					<div class="wrap-contact100-form-btn">
  						<div class="contact100-form-bgbtn"></div>
							<button type="submit" class="contact100-form-btn" name="register" value="DAFTAR"/>
              <span>
                Daftar
              </span>
            </div>

            <div class="text-center p-t-35">
              ||
						<a href="login.php" class="txt2" style="margin-left:0px;">
							Login
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
          </div>
					</div>
				</form>
			</div>
		</div>
	</div>


  <!--===============================================================================================-->
  	<script src="register/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  	<script src="register/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  	<script src="register/vendor/bootstrap/js/popper.js"></script>
  	<script src="register/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  	<script src="register/vendor/select2/select2.min.js"></script>
  	<script>
  		$(".selection-2").select2({
  			minimumResultsForSearch: 20,
  			dropdownParent: $('#dropDownSelect1')
  		});
  	</script>
  <!--===============================================================================================-->
  	<script src="register/vendor/daterangepicker/moment.min.js"></script>
  	<script src="register/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  	<script src="register/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  	<script src="register/js/main.js"></script>

  	<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>

  </body>
  </html>
