<?php
 require_once("auth.php");
  require_once("config.php");

					$id=$_SESSION['user']['id'];
					$sql_select ="SELECT * FROM upload WHERE id=$id";
					$stmt =$db->prepare($sql_select);
					$stmt->bindParam(1, $_REQUEST['id']);
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$name=$row['name'];

	$sql = "SELECT * FROM user WHERE id= id";
    $stmt = $db->prepare($sql);
    $params = array(
        ":id" => $id,
    );
    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
	$sql = "INSERT INTO upload (id) VALUES (:id)";
    $stmt = $db->prepare($sql);
    $params = array(
        ":id" => $id,

    );
	$saved = $stmt->execute($params);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda</title>


    <!--===============================================================================================-->
    	<link rel="icon" href="index/img/sad.png" type="image/png">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="tabel/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="tabel/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="tabel/vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="tabel/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="tabel/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="tabel/css/util.css">
    	<link rel="stylesheet" type="text/css" href="tabel/css/main.css">
    <!--===============================================================================================-->

</head>
<body class="container-table100">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">
                    <img src="index/img/logo.png" alt="" style="width:150px;">
                    <img style="margin-top:20px;" class="img img-responsive rounded-circle mb-3" width="160" src="img/upload/<?php echo $name?>" />

                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                    <p style="padding:5px 0px;"><?php echo $_SESSION["user"]["email"] ?></p>

                    <p ><a style="padding:10px 26.7%;" href="logout.php" class="hvr-fade">Logout</a></p>
          					<p ><a style="padding:10px 21.7%;" href="editprofile.php?id=<?php echo $_SESSION['user']['id']?>" class="hvr-fade">Edit Profile</a> </p>
          					<p ><a style="padding:10px 20%;" href="upload.php?id=<?php echo $_SESSION['user']['id']?>" class="hvr-fade">Upload Foto</a></p>
                </div>
            </div>

		<div >
			<div >
            <p style="padding:10px 0px;"><a href="pemasukan.php?id=<?php echo $d['id']; ?>" class="btn-base btn-cta btn-4 btn-block hvr-icon-wobble-vertical"> <i class="fa fa-arrow-up hvr-icon"></i><span>&nbsp;&nbsp;Pemasukan</span></a> </p>

            <p style="padding:0px 0px;"><a href="pengeluaran.php?id=<?php echo $d['id']; ?>" class="btn-base btn-cta btn-4 btn-block hvr-icon-wobble-vertical"><i class="fa fa-arrow-down hvr-icon"></i><span>&nbsp;&nbsp;Pengeluaran</span></a> </p>
			</div>
         </div>
        </div>


        <div class="col-md-8">

            <form action="" method="post" />
                <div class="form-group text-center">

                    <label ><h3 style="color:white;">Saldo Rp.
                      <?php
                      function rupiah($angka){

                      	$hasil_rupiah = number_format($angka,2,',','.');
                      	return $hasil_rupiah;

                      }

                      $server = "localhost";
                      $user = "root";
                      $password = "";
                      $nama_database = "uangjajanku";

                      $db = mysqli_connect($server, $user, $password, $nama_database);

                      $tampil=$_SESSION['user']['id'];
                      $sql = "SELECT * FROM users WHERE id=$tampil";
                      $query = mysqli_query($db, $sql);
                      while($data = mysqli_fetch_array($query)){


                         echo rupiah($data['saldo']);
                      }

                       ?>

                    </h3></textarea>
                </div>
            </form>

            <div >
                <div >
                	<table>
                    <thead>
                        <tr class="table100-head" >
                			      <th class="column1 text-center">No</th>
                            <th class="column2 text-center">Tipe</th>
                            <th class="column3 text-center">Kategori</th>
                            <th class="column4 text-center">Judul</th>
                            <th class="column5 text-center">Jumlah</th>
                            <th class="column6 text-center">Tanggal</th>
                            <th class="column7 text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="table" style="font-size: 13px; border:0px;"><p>

                     <?php

                	$server = "localhost";
                	$user = "root";
                	$password = "";
                	$nama_database = "uangjajanku";

                	$db = mysqli_connect($server, $user, $password, $nama_database);

                		if( !$db ){
                		die("Gagal terhubung dengan database: " . mysqli_connect_error());
                		}
                        $tampil=$_SESSION['user']['id'];

                        $sql = "SELECT * FROM recent WHERE id_link=$tampil";
                        $query = mysqli_query($db, $sql);
                		    $no= 1;
                        while($data = mysqli_fetch_array($query)){
                            echo "<tr>";

                            echo "<td>".$no."</td>"; $no=$no+1;
                            echo "<td>".$data['tipe']."</td>";
                            echo "<td>".$data['kategori']."</td>";
                            echo "<td>".$data['judul']."</td>";
                            echo "<td> Rp.".rupiah($data['jumlah'])."</td>";
                            echo "<td>".$data['tanggal']."</td>";

                            echo "<td>";
                            echo "<a href='editrecent.php?id=".$data['id']."' style='color:#c850c0;'>Edit</a> | ";
                            echo "<a href='hapus.php?id=".$data['id']."' style='color:#ff6666;'>Hapus</a>";
                            echo "</td>";

                            echo "</tr>";
                        }
                        ?>
                	</p>
                    </tbody >
                    </table>

                    <p style="padding:10px 0px; color:white;">Total: <?php echo mysqli_num_rows($query) ?></p>
                  </div>
            </div>
        </div>
    </div>
</div>

<!--===============================================================================================-->
	<script src="tabel/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="tabel/vendor/bootstrap/js/popper.js"></script>
	<script src="tabel/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="tabel/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="tabel/js/main.js"></script>

</body>
</html>
