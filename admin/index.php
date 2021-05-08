<?php
require_once("auth.php");
include 'connect.php';
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Admin</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/templatemo_main.css">
<!--
Dashboard Template
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Admin #<?php echo  $_SESSION["user"]["username"] ?></h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li><a href="index.php"><i class="fa fa-users"></i><span class="badge pull-right"></span>Manage Users</a></li>
          <li><a href="tables.php"><i class="fa fa-database"></i><span class="badge pull-right"></span>Manage Data</a></li>
          <li><a href="logout.php" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <h1>Kelola Akun</h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Saldo</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  function rupiah($angka){

                    $hasil_rupiah = number_format($angka,2,',','.');
                    return $hasil_rupiah;

                  }
                     $sql = "SELECT * FROM users WHERE id";
                     $query = mysqli_query($db, $sql);
                     $no= 1;
                     while($data = mysqli_fetch_array($query)){
                         echo "<tr>";

                         echo "<td>".$no."</td>"; $no=$no+1;
                         echo "<td>".$data['id']."</td>";
                         echo "<td>".$data['name']."</td>";
                         echo "<td>".$data['username']."</td>";
                         echo "<td>".$data['email']."</td>";
                         echo "<td>".$data['password']."</td>";
                         echo "<td> Rp.".rupiah($data['saldo'])."</td>";
                         echo "<td><a href='editprofile.php?id=".$data['id']."' style='color:#c850c0;'>Edit</a> | ";
                         echo "<a href='hapusdata.php?id=".$data['id']."' style='color:#ff6666;'>Hapus</a> </td>";
                     }
                ?>

                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="sign-in.html" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2019 Uang-jajanku.com</p>
        </div>
      </footer>
    </div>
</body>
</html>
