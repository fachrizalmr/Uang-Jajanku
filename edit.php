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

		$tampil=$_SESSION['user']['id'];
		$sql = "SELECT * FROM user WHERE id=$tampil";
		while($data = mysqli_fetch_array($query)){
			 $saldo=$data['saldo'];
		 }
		 echo $saldo;

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    // buat query update
    $sql = "UPDATE recent SET tipe='$tipe', kategori='$kategori', judul='$judul', jumlah='$jumlah', tanggal='$tanggal' WHERE id=$id";
    $query = mysqli_query($db, $sql);

		 if($tipe=="Pemasukan"){
			$saldo=$saldo+$jumlah;
		 }

		 if($tipe=="Pengeluaran"){
			$saldo=$saldo-$jumlah;
		 }

		$sql ="UPDATE users SET saldo='$saldo' where id=$tampil";
		$query = mysqli_query($db, $sql);
    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: timeline.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>
