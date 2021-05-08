<?php
	require_once("auth.php");
	$server = "localhost";
	$user = "root";
	$password = "";
	$nama_database = "uangjajanku";

	$db = mysqli_connect($server, $user, $password, $nama_database);

		if( !$db ){
		die("Gagal terhubung dengan database: " . mysqli_connect_error());
		}

		$jumlah=0;
		$tipe;
		$tampil=$_SESSION['user']['id'];


if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
		$sql = "SELECT * FROM recent WHERE id_link=$tampil&&id=$id ";
		$query = mysqli_query($db, $sql);
		while($data = mysqli_fetch_array($query)){
			 $jumlah=$data['jumlah'];
			 $tipe=$data['tipe'];
		 }
    $sql = "DELETE FROM recent WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: timeline.php');
    } else {
        die("gagal menghapus...");
    }

}

		$tampil=$_SESSION['user']['id'];
		$sql = "SELECT * FROM users WHERE id=$tampil";
		$query = mysqli_query($db, $sql);
			while($data = mysqli_fetch_array($query)){
				 $saldo=$data['saldo'];
		}
		if ($tipe=="Pemasukan"){
		$saldo=$saldo-$jumlah;
		}
		if ($tipe=="Pengeluaran"){
		$saldo=$saldo+$jumlah;
		}

		$tampil=$_SESSION['user']['id'];
		$sql = "UPDATE users SET saldo=$saldo WHERE id=$tampil";
		$query = mysqli_query($db, $sql);



?>
