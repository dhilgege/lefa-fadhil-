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
  <title>informasi</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- fullcalendar css  -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
  <link rel="stylesheet" href="stylesinformasi.css" >
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
 
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
 
    </script>
</head>
<body>
 
<nav class="navbar">
  <ul>
    <li><a href="beranda.php">Beranda</a></li>
    <li><a href="informasi.php">Informasi Ruangan</a>
    <?php { echo "<a href='logout.php'> logout</a>" ;}?>
    </li>
  </ul>
</nav>
<h2 class="informasi-ruangan">Informasi Ruangan</h2>
    <div class="login">
<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} else { echo "<a href='registrasi.php'> Registrasi</a>"; }?>
    </div>
<table border="1"  id="dataTables1" class="table">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Jenis Ruangan</th>
                <th class="center">Nama Rungan</th>
                <th class="center">Kapasitas</th>
               
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel obat
            $query = mysqli_query($mysqli, "SELECT * FROM ruangan  ")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));
 
            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
             
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td nowrap width='80' class='center'><a href='ruang.php?id=$data[id_ruangan]'>$data[jenis_ruangan]</a></td>
                      <td width='180'class='center'>$data[nama_ruangan]</td>
                      <td width='100' align='left'>$data[kapasitas]</td>";
                     
                                               
            ?>
           
            <?php
             echo '</td>';
              $no++;
            }
            ?>
            </tbody>
          </table>
          <div class="container mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="alert alert-warning" role="alert">
          <h4>Status Penjajuan Booking </h4>
    <?php $query = "SELECT * FROM booking where status= 'ditolak' OR status = 'booking' and nama_dosen= '".$_SESSION['username']."'"; // Change 'nama_tabel_pesanan' to your actual table name
$result = mysqli_query($mysqli, $query); ?><table border="1" class="order-table">
            <thead>
                <tr>
                   
                   
           
                </tr>
            </thead>
            <tbody>
                <!-- Data pesanan dari database -->
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                 
                    echo "<td>{$row['waktu']}</td>";
          echo "<td>{$row['id_ruangan']}</td>";
                  if($row['status'] == 'booking'){
 
                    echo "<td>Menunggu Konfirmasi</td>";
                  }else{
                    echo "<td>{$row['status']}</td>";
 
                  }
 
                 
                 
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
                    </div>
                    <div class="card">
                        <form action="prosesfrom.php" method="POST">
                            <div class="card-body">
                              Form Booking
                                <div class="form-group">
                <div class="form-group mt-4">
                                    <div class="form-label">User</div>
                                    <input name="nama_dosen" type="text" readonly="true" class="form-control" id="mulai" value="<?php echo $_SESSION['username']; ?>">
                    <input name="status" type="hidden" id="status" value="booking">
                </div>
               
                                    <div class="form-label">Prodi</div><?php $us=$_SESSION['id_user'];
                   $queryi234 = mysqli_query($mysqli,"SELECT * FROM user WHERE id_user=$us ");
$user = mysqli_fetch_array($queryi234);
                    ?>
                                    <input name="prodi" type="text" readonly="true" class="form-control" id="mulai" value="<?php echo $user['prodi']; ?>">
                                </div>
                                    <div class="form-label">pilih ruangan</div>
                                    <div><select class="chosen-select" name="id_ruangan" data-placeholder="-- Pilih Helm --" onchange="tampil_helm(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT * FROM ruangan ")
                                                            or die('Ada kesalahan pada query tampil obat: '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[id_ruangan]\"> $data_obat[jenis_ruangan] | $data_obat[nama_ruangan] </option>";
                      }
                    ?>
                  </select>
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Mulai</div>
                                    <input type="datetime-local" class="form-control" name="waktu" id="mulai">
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Tgl Selesai</div>
                                    <input type="datetime-local" class="form-control" name="selesai" id="selesai">
                                </div>
                              <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                 <?php if ($_SESSION["level"] == 1){
                        echo "<a href='booking.php'>admin</a>";
                      }
                      elseif ($_SESSION["level"] == 2){
                        echo'';
                      } ?>                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [<?php
 
    //melakukan koneksi ke database
    $koneksi    = mysqli_connect('localhost', 'root', '', 'bookinglab');
    //mengambil data dari tabel jadwal
    $data       = mysqli_query($koneksi,'select * from booking where status="disetujui"');
    //melakukan looping
    while($d = mysqli_fetch_array($data)){  
?>
{
    title: '<?php echo $d['id_ruangan']; ?>', //menampilkan title dari tabel
    start: '<?php echo $d['waktu']; ?>', //menampilkan tgl mulai dari tabel
    end: '<?php echo date('Y-m-d', strtotime($d['selesai'] . ' +1 day')); ?>' //menampilkan tgl selesai dari tabel
},
<?php } ?> ],
                    selectOverlap: function (event) {
                        return event.rendering === 'background';
                    }
                });
   
                calendar.render();
            });
        </script>
  </body>