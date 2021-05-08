<?php

require_once("config.php");

try {
	
	$query = "UPDATE users SET name=:name, username=:username, email=:email, password=:password WHERE id=:id";

	$stmt = $db->prepare($query);
	
	$stmt->bindParam(':name', $_POST['name']);
	$stmt->bindParam(':username', $_POST['username']);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password',password_hash($_POST['password'], PASSWORD_DEFAULT));
	$stmt->bindParam(':id', $_POST['id']);
	
	if($stmt->execute()){
		header("location: logout.php?update_success");
	}else {
		die('Data gagal di update');
	}	
}  catch (PDOException $exception){
	echo "Error: " . $exception->getMessage();
}

?>