<?php
session_start();

if (empty($_SESSION['login'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kontrakan</title>
    <!-- css link -->
    <link rel="stylesheet" href="css/admin.css">
</head>

<?php
require 'function.php';

$pesanan = query("SELECT pemesanan.*, pembayaran.*, kontrakan.*
                FROM pemesanan LEFT JOIN pembayaran ON pemesanan.id_bayar = pembayaran.id_pembayaran
                LEFT JOIN kontrakan ON pemesanan.no_kontrakan = kontrakan.no_kontrakan
                WHERE pemesanan.status = 'belum'");

if (isset($_GET['terima'])) {
    mysqli_query($koneksi, "UPDATE pemesanan SET status = 'sudah' WHERE id_pesanan ='$_GET[terima]'");
    echo "<script>
    alert('Pesanan telah diterima');
    document.location.href = 'dashboard.php';
    </script>";
}

if (isset($_GET['tolak'])) {
    mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pesanan ='$_GET[tolak]'");
    echo "<script>
    alert('Pesanan telah ditolak');
    document.location.href = 'dashboard.php';
    </script>";
}

$i = 1;
?>

<body>

    <div class="navbar" id="myNavbar">
        <a href="#" class="active">Home</a>
        <a href="tambah_kontrakan.php">Kelola Kontrakan</a>
        <a href="dashboard.php">Konfirmasi Pemesanan</a>
        <a href="#" class="icon" onclick="toggleNavbar()">
            &#9776;
        </a>
    </div>

    <!-- JavaScript for Navbar -->
    <script>
        function toggleNavbar() {
            var navbar = document.getElementById("myNavbar");
            if (navbar.className === "navbar") {
                navbar.className += " responsive";
            } else {
                navbar.className = "navbar";
            }
        }

        function konfirmasi() {
            return confirm('Apakah Anda yakin ingin menolak pesanan?');
        }
    </script>

    <h1> INI ADMINN </h1>

    <table border="1px" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>No Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Pembayaran</th>
            <th>No. Kontrakan</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($pesanan as $value) { ?>
                <tr>
                    <td align="right"><?= $i++ ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['no_tlp'] ?></td>
                    <td><?= $value['jk'] ?></td>
                    <td><?= $value['metode_bayar'] ?></td>
                    <td align="right"><?= $value['no_kontrakan'] ?></td>
                    <td align="center">
                        <a href="?terima=<?= $value['id_pesanan'] ?>">Terima</a>
                        <a href="?tolak=<?= $value['id_pesanan'] ?>" onclick="return konfirmasi();">Tolak</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="dashboard_sudah.php"> Lihat Rincian </a>

</body>

</html>
