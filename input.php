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


// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $tipe = $_POST['tipe'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $jumlah = $_POST['jumlah'];
		$tanggal = $_POST['tanggal'];
		$id=$_POST['id'];

    // buat query

    $sql = "INSERT INTO recent (tipe,kategori,judul,jumlah,tanggal,id_link) VALUE ('$tipe', '$kategori', '$judul', '$jumlah' ,'$tanggal','$id')";
    $query = mysqli_query($db, $sql);

		$tampil=$_SESSION['user']['id'];
		$sql = "SELECT * FROM users WHERE id=$tampil";
		$query = mysqli_query($db, $sql);
			while($data = mysqli_fetch_array($query)){
				 $saldo=$data['saldo'];
		}
		if ($tipe=="Pemasukan"){
		$saldo=$saldo+$jumlah;
		}
		if ($tipe=="Pengeluaran"){
		$saldo=$saldo-$jumlah;
		}

		$tampil=$_SESSION['user']['id'];
		$sql = "UPDATE users SET saldo=$saldo WHERE id=$tampil";
		$query = mysqli_query($db, $sql);
    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: timeline.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: timeline.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>
