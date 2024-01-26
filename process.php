<?php
session_start();

include "koneksi.php";

//dapatkan data user dari form
$user = [
	'username' => $_POST['username'],
	'password' => $_POST['password'],
];

//check apakah user dengan username tersebut ada di table users
$query = "select * from users where username = ? limit 1";

$stmt = $mysqli->stmt_init();

$stmt->prepare($query);

$stmt->bind_param('s', $user['username']);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_array(MYSQLI_ASSOC);

if($row != null){
	//username ditemukan
	//kita cek apakah password dengan hash password sesuai.
	if(password_verify($user['password'], $row['password'])){
		$_SESSION['login'] = true;
		$_SESSION['username'] =  $user['username'];
		$_SESSION['nama'] =  $user['nama'];
		$_SESSION['message']  = 'Berhasil login ke dalam sistem.';
		if($row ['role_id']==1) {
			$_SESSION['user_id'] = $row['id'];


			$query = "select * from bengkel where users_id = ? limit 1";

$stmt = $mysqli->stmt_init();

$stmt->prepare($query);

$stmt->bind_param('s', $_SESSION['user_id']);

$stmt->execute();

$result = $stmt->get_result();

$rowCekBengkel = $result->fetch_array(MYSQLI_ASSOC);
if ($rowCekBengkel != null) {
	header("Location: buka_bengkel3.php");
}else{
	header("Location: bengkel.php");

}
		}else{ 
			header("Location: hompage.php");
		}		

	}else{
		$_SESSION['error'] = 'Password anda salah.';
		header("Location: login.php");
	}

}else{
	$_SESSION['error'] = 'Username dan password anda tidak ditemukan sayang:*.';
	header("Location: login.php");
}

?>