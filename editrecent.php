<?php

	$server = "localhost";
	$user = "root";
	$password = "";
	$nama_database = "uangjajanku";

	$db = mysqli_connect($server, $user, $password, $nama_database);

		if( !$db ){
		die("Gagal terhubung dengan database: " . mysqli_connect_error());
		}

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: timeline.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM recent WHERE id=$id";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
		<link rel="icon" href="index/img/sad.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
		<title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="edit/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="edit/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="edit/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="edit/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="edit/css/main.css" rel="stylesheet" media="all">
		<style>
		/* Variables
–––––––––––––––––––––––––––––––––––––––––––––––––– */
:root {
--primary-c: #00dbde;
--secondary-c:  #b3feff;

--white: #FDFBFB;

--text: #082943;
--bg: var(--primary-c);
}


/* Basic Config
–––––––––––––––––––––––––––––––––––––––––––––––––– */

ul {
list-style-type: none;
padding-left: 50px;
margin: 0;
}

li {
display: block;
position: relative;
padding: 10px 0px;
}

h2 {
margin: 0px 0;
font-weight: 900;
}


/* Card
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.card {
display: flex;
flex-direction: column;
background: var(--white);
width:100%;
padding: 0px 25px;
border-radius: 15px;
box-shadow: 0 19px 38px rgba(0, 0, 0, 0.13);
}


/* Radio Button
–––––––––––––––––––––––––––––––––––––––––––––––––– */
input[type=radio] {
position: absolute;
visibility: hidden;
}

label {
cursor: pointer;
font-weight: 400;
}


.check {
width: 35px; height: 35px;
position: absolute;
border-radius: 50%;
transition: transform .6s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}

/* Reset */
input#one ~ .check {
transform: translate(-50px, -35px);
background: var(--secondary-c);
}
input#two ~ .check {
transform: translate(-50px, -90px);
background: var(--primary-c);
box-shadow: 0 6px 12px rgba(33, 150, 243, 0.35);
}

/* Radio Input #1 */
input#one:checked ~ .check { transform: translate(-50px, 15px); }

/* Radio Input #2  */
input#two:checked ~ .check { transform: translate(-50px, -39px); }
		</style>
</head>
<body>
	<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
			<div class="wrapper wrapper--w680">
					<div class="card card-2">
						<p>&larr; <a href="timeline.php" style="color:#00dbde; color:hover:#c850c0;">Kembali</a>
							<div class="card-body">
									<h2 class="title">Edit</h2>

    <form action="edit.php" method="POST">

        <fieldset>

            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />

						<div class="row row-space">
								<div class="col-5">
										<div class="input-group">
												<div class="card">
														<label for="tipe"></label>
            								<?php $tipe = $data['tipe']; ?>
															<ul>
																<li>
										            <input  class="" id="one" type="radio" name="tipe" value="Pemasukan" <?php echo ($tipe == 'Pemasukan') ? "checked": "" ?>><label for="one"> Pemasukan</label>
																<div class="check"></div>
																</li>
																<li>
																<input  class="" id="two" type="radio" name="tipe" value="Pengeluaran" <?php echo ($tipe == 'Pengeluaran') ? "checked": "" ?>><label for="two"> Pengeluaran</label>
																<div class="check"></div>
																</li>
															</ul>
														</div>
												</div>
											</div>

			<div class="col-7">
				<div class="input-group">
					<?php $kategori = $data['kategori']; ?>
		            <label for="nama" class="label">Kategori</label>
		            <input class="input--style-4" type="text" name="kategori" placeholder="Kategori" value="<?php echo $data['kategori'] ?>" />
        </div>
			</div>
		</div>

		<div class="row row-space">
				<div class="col-6">
						<div class="input-group">
								<?php $judul = $data['judul']; ?>
            			<label for="judul" class="label">Judul</label>
            			<input class="input--style-4" type="text" name="judul" placeholder="Judul" value="<?php echo $data['judul'] ?>" />
        		</div>
					</div>

					<div class="col-6">
							<div class="input-group">
							<?php $tanggal = $data['tanggal']; ?>
									<label for="tanggal" class="label">Tanggal</label>
									<input class="input--style-4" type="date" name="tanggal" value="<?php echo $data['tanggal'] ?>" />
							</div>
				</div>
			</div>

			<div class="row row-space">
				<div class="col-12">
						<div class="input-group">
				<?php $jumlah = $data['jumlah']; ?>
				<label for="jumlah" class="label">Jumlah</label>
				<input class="input--style-4" type="number" name="jumlah" value="<?php echo $data['jumlah'] ?>" />
			</div>
		</div>
		</div>

            <input type="submit"  class="btn btn--radius-2 btn--blue btn-block" value="Simpan" name="simpan" />

        </fieldset>


    </form>

    </body>
</html>
