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



if( isset($_GET['id']) ){

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";
    $query = mysqli_query($db, $sql);

    $idlink=$id;
    $sql = "DELETE FROM recent WHERE id_link=$idlink";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php');
    } else {
        die("gagal menghapus...");
    }

}


?>
