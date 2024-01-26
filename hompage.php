<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="hompage.css">
</head>

<body>
    
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="#bb">barang bagus</a></li>
                        <li><a href="register.php">buka bengkel</a></li>
                        <li><a href="logout.php">logout</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Aplikasi <br> Pemboookingan <br> Online</h1>
                    <p>silahkan pilih bengkel yang ingin anda booking atau produk yang ingin anda beli.</p>
        
                </div>

                     <div class="anjay">


                         
                         </div>           
                         <?php
$query = "select * from bengkel";
$stmt = $mysqli->stmt_init();
$stmt->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>



</div>
<div class="produk">
    <h2>Bengkel</h2>
</div>
	<?php

while ($row = $result->fetch_assoc()) {

    $i = 1;
    ?>

    
   <div class="card" id="bo">
  <img src="<?= 'gambar/' . $row['gambar'] ?>"alt="barang 1" style="width:100%"></a>
  <h1><?= $row['nama_bengkel'] ?></h1>
  <p class="price"><?= $row['alamat'] ?></p>
  <p>warna  <?= $row['jam_buka'] ?></p>
  <button onclick="location.href='booking.php'">booking</button>
</div>
	<?php
}
?>
                </div>
            </div>
        </div>
    </div>
</p>



<br>


<div class="produk" id="bo">
    <h2>Produk</h2>
</div>

                    <?php
$query = "select * from sparepart";
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
   <div class="card">
  <img src="<?= 'gambar/' . $row['gambar'] ?>"alt="barang 1" style="width:100%"></a>
  <h1><?= $row['nama'] ?></h1>
  <p class="price"><?= $row['harga'] ?></p>
  <p>warna  <?= $row['warna'] ?></p>
  <p>stok <?= $row['jumlah'] ?> item</p>
  <p><button>Add to Cart</button></p>
</div>
	<?php
}
?>
                </div>
            </div>
        </div>
    </div>

</br>
    <!-- Feadtued Categories -->


    <div class="offer" id="bb">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="cdi brt.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>barang bagus gan</p>
                    <h1>cdi brt dtracker150 klx150 powermax dualband racing</h1>
                    <small>Cdi BRT POWERMAX DUALBAND klx150 d tracker 150 limited edition. ..( limitnya 12.500).
                            Cdi terbagi 2 jenis, TR ( TUNE UP RACING ) dan RK ( RACING KOMPETISI). <br></small>
                    <a href="https://www.lazada.co.id/products/cdi-brt-dtracker150-klx150-powermax-dualband-racing-i5053576308-s12728974896.html?spm=a2o4j.tm80150940.3312045370.1.36fdVJL5VJL5BC.36fdVJL5VJL5BC" target="blank " class="btn">Beli achh &#8594;</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <div class="footer" id="about">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <img src="Screenshot_2024-01-22_185206-removebg-preview.png">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
                    </p>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2020 - DhilGege</p>
        </div>
    </div>

    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

</body>

</html>