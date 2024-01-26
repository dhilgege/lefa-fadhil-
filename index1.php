<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login & Logout PHP</title>
	<style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #43ff3daf;
      text-align: center;
    }
 
    form {
      max-width: 600px;
      margin: 0 auto;
      background-color: #66666636;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
 
    label {
      display: block;
      margin-bottom: 8px;
    }
 
    input,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }
 
    button {
      background-color: #007BFF;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
 
    .available-kosan {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
 
    .kosan-card {
      width: 200px;
      margin: 10px;
      padding: 10px;
      background-color: #A2FF86;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
 
    img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
      margin-bottom: 10px;
    }
 
    /* Tombol Kembali pada pesanan */
    .bwh a {
      text-decoration: none;
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
      background-color: #007BFF;
      border: 1px solid #000000;
      color: #fff;
      border-radius: 8px;
    }
  </style>
</head>
<body>
	
<?php
$query = "select * from kontrakan";
$stmt = $mysqli->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

	
		
	</div>
	<?php

while ($row = $result->fetch_assoc()) {

    $i = 1;
    ?>
	 <div class="kosan-card">
          <a href="product_details.html"><img src="<?= 'gambar/' . $row['gambar'] ?>" alt="Kontrakan 1"></a>
          <input type="hidden" name="kamar" value="<?= $row['no_kontrakan'] ?>">
          <p>Kontrakan <?= $row['no_kontrakan'] ?></p>
          <!-- <form action="admin.php" method="post" enctype="multipart/form-data"> -->
          <!-- <button type="submit" name="pesan">Pesan Sekarang</button> -->
        </div>
	<?php
}
?>
</body>
</html>