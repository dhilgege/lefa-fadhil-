<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.wrapper{
    position: relative;
    width: 350px;
    height: 500px;
    background: transparent;
    border: -40px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(30px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    justify-content: center;
    align-items: center;
    left: 450px;
}


.wrapper .form-box{
width: 100%;
padding: 40px;
}

.form-box h2 {
    font-size: 2em;
    color: #162938;
    text-align: center;
    margin-bottom: 5px;
    height: 50px;
}

.input-box{
    position: relative;
    width: 100%;
    right: 20px;
    height: 50px;
    border-bottom: 2px solid #162938;
    margin: 20px;
}


.input-box input:focus~label,
.input-box input:valid~label{
top:-5px;
}


.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #162938;
    font-weight: 600;
    padding: 5px;
    
}

.btn{
    width: 220px;
    height: 45px;
    background: #162938;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer ;
    font: size 1em;
    color: #fff;
    font-weight: 500;
}



</style>
</head>
<body>

<?php

require 'function.php';

// $kontrakan = query("SELECT * FROM sparepart");

if (isset($_POST['save'])) {
    $nama_bengkel = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jam_buka = $_POST['jam_buka']; 
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
            $user_id=$_SESSION["user_id"];

            move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $rand . '.' . $ext);
            // mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
            $insert_data = mysqli_query($koneksi, "INSERT INTO bengkel (users_id, nama_bengkel, alamat, jam_buka, gambar) VALUES ('$user_id','$nama_bengkel','$alamat','$jam_buka', '$xx')");
            if ($insert_data) {
                $got = "kontrakan telah ditambahkan";
                $_SESSION['success_message'] = $got;
                header('Location: buka_bengkel.php');
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
                <h1>Tambah data bengkel</h1>
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
                            <td>nama bengkel </td>
                            <td>:</td>
                            <td><input type="text" name="nama" required></td>
                        </tr>
                        <tr>
                            <td>alamat</td>
                            <td>:</td>
                            <td><input type="text" name="alamat"></td>
                        </tr>
                        <tr>
                            <td>jam buka</td>
                            <td>:</td>
                            <td><input type="text" name="jam_buka"></td>
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
</htxml>
