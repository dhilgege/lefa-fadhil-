<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}


.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="buka_bengkel.php">Home</a>
  <a href="toko.php" class="active">Toko</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<?php

require 'function.php';

// $kontrakan = query("SELECT * FROM sparepart");

if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $warna = $_POST['warna'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
var_dump($nama);
    $rand = rand();
    // $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    // if (!in_array($ext, $ekstensi)) {
    //     header("location:toko.php");
    // } else {
        if ($ukuran < 1044070) {
            $xx = $rand . '.' . $ext;
            $id_bengkel=$_SESSION["id_bengkel"];
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $rand . '.' . $ext);
            // mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
            $insert_data = mysqli_query($koneksi, "INSERT INTO sparepart (id_bengkel, nama, warna, jumlah, harga, gambar) VALUES ('$id_bengkel','$nama','$warna','$jumlah', '$harga', '$xx')");
            if ($insert_data) {
                $got = "kontrakan telah ditambahkan";
                $_SESSION['success_message'] = $got;
                header('Location: toko.php');
                exit;
            } else {
                echo "<script>alert('kontrakan gagal disimpan!')</script>";
            }
            // header("location:index.php?alert=berhasil");
        } else {
            header("location:index.php?alert=gagak_ukuran");
        }
    // }



    // if ($status == true) {
    //     header('location: http://localhost/project/makanan.php#tambah');
    // }

}


if (isset($_SESSION['success_message'])) {
    $got = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // hapus pesan dari session
}

$i = 1
?>

<body>
    <!-- Java script navbar -->
    <script>
        function toggleNavbar() {
            var navbar = document.getElementById("myNavbar");
            if (navbar.className === "navbar") {
                navbar.className += " responsive";
            } else {
                navbar.className = "navbar";
            }
        }
    </script>

    <!-- list kontrakan -->
    <div class="list">
        <table border="1px" cellspacing="0">
        
    <!-- Form -->
    <div class="container">
        <div class="form" id="tambah">
            <div class="judul">
                <h1>Tambah Produk</h1>
            </div>
            <div class="isian">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td colspan="3">
                                <?php if (!empty($error)) { ?>
                                    <p class="alert"><?php echo $error; ?></p>
                                <?php } ?>
                                <?php if (!empty($got)) { ?>
                                    <p class="got"><?php echo $got; ?></p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>nama</td>
                            <td>:</td>
                            <td><input type="text" name="nama" required></td>
                        </tr>
                        <tr>
                            <td>harga</td>
                            <td>:</td>
                            <td><input type="number" name="harga" min="0" required></td>
                        </tr>
                        <tr>
                            <td>warna</td>
                            <td>:</td>
                            <td><input type="text" name="warna"></td>
                        </tr>
                        <tr>
                            <td>jumlah</td>
                            <td>:</td>
                            <td><input type="text" name="jumlah"></td>
                        </tr>
                        <tr>
                            <td>File</td>
                            <td>:</td>
                            <td><input type="file" name="gambar"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center">
                                <button type="submit" name="save">Save</button>
                                <button type="reset" name="reset">Reset</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script>
        function konfirmasi() {
            return confirm('Apakah Anda yakin ingin menghapus kontrakan ini?');
        }
    </script>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
