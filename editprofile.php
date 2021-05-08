<?php
 require_once("auth.php");
 require_once("config.php");
 try {
 $sql_select ="SELECT * FROM users WHERE id= ?";
 $stmt =$db->prepare($sql_select);

 $stmt->bindParam(1, $_REQUEST['id']);
 $stmt->execute();

 $row = $stmt->fetch(PDO::FETCH_ASSOC);

 $id=$row['id'];
 $name=$row['name'];
 $username=$row['username'];
 $email=$row['email'];
 }
 catch (PDOException $exception) {
	 echo "Error : ". $exception->getMessage();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Profile</title>
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
				<form class="contact100-form validate-form" action="update.php" method="post">
					<span class="contact100-form-title">
						EDIT PROFILE
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
            <span class="label-input100">Fullname</span>
            <input type="hidden" name="id" value="<?php echo $id ?>"/>
						<input class="input100" type="text" name="name" value="<?php echo $name ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" value="<?php echo $email ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
            <span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" value="<?php echo $username ?>">
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
							<button type="submit" class="contact100-form-btn" name="simpan" value="SIMPAN"/>
              <span>
                Simpan
              </span>
            </div>


            <div class="text-center p-t-35">
						<a href="timeline.php" class="txt2">
              <i class="fa fa-long-arrow-left m-l-5"></i>
							Back

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
    	<script src="register/vendor/bootstrap/js/popper.js"></script>
    	<script src="register/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    	<script src="register/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    	<script src="register/vendor/tilt/tilt.jquery.min.js"></script>
    	<script >
    		$('.js-tilt').tilt({
    			scale: 1.1
    		})
    	</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>

    <!--===============================================================================================-->
    	<script src="register/js/main.js"></script>

    </body>
    </html>
