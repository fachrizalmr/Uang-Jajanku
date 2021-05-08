<?php
require_once("auth.php");
require_once("config.php");
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengeluaran</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--===============================================================================================-->
      <link rel="icon" href="index/img/sad.png" type="image/png">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/vendor/animate/animate.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="indit/css/util.css">
      <link rel="stylesheet" type="text/css" href="indit/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="contact100-form-title" style="background-image: url(indit/images/bg-01.jpg);">

          <span class="contact100-form-title-1">
              Pengeluaran
            </span>

            <span class="contact100-form-title-2">
              Input Data Pengeluaran Anda ...
            </span>

          </div>

          <p style="margin-left:10px;">&larr; <a href="timeline.php">Kembali</a>
    <form class="contact100-form validate-form" action="input.php" method="POST">

        <fieldset>
          <input type="hidden" name="id" value="<?php echo  $_SESSION["user"]["id"] ?>">
          <label><input type="hidden" name="tipe" value="Pengeluaran"></label>


            <div class="wrap-input100 validate-input input100-select" data-validate="Kategori">
            <span class="label-input100 ">Kategori</span>
            <select class="selection-2" name="kategori">
                <option>Pilih Kategori ... </option>
                <option value="Transportasi">Transportasi</option>
                <option value="Makanan dan Minuman">Makanan dan Minuman</option>
                <option value="Akomodasi">Akomodasi</option>
                <option value="Kebutuhan Harian">Kebutuhan Harian</option>
                <option value="Belanja">Belanja</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Judul">
            <span class="label-input100">Judul</span>
            <input class="input100" type="text" name="judul">
            <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Jumlah">
            <span class="label-input100">Jumlah</span>
            <input class="input100" type="number" name="jumlah">
            <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Tanggal">
            <span class="label-input100">Tanggal</span>
            <input class="input100" type="date" name="tanggal">
            <span class="focus-input100"></span>
            </div>


            <div class="container-contact100-form-btn">
            <button type="submit"  class="contact100-form-btn" value="Input" name="input">
            <span>
              Input
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>


        </fieldset>

    </form>

        	<div id="dropDownSelect1"></div>

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
