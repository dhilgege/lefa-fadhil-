<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Essence - Fashion Ecommerce Template</title>
    <link rel="icon" href="Screenshot_2023-12-05_211623-removebg-preview.png">
    <link rel="stylesheet" href="booking.css">
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <div class="elem-group h2">
                <h2>BOOKING</h2>
            </div>
            <div class="elem-group">
                <label for="name">NAMA</label>
                <input type="text" id="name" name="visitor_name" placeholder="Your name" pattern="[A-Za-z\s]{3,20}" required>
            </div>
            <div class="elem-group">
                <label for="phone">NO.HP</label>
                <input type="tel" id="phone" name="visitor_phone" placeholder="+62829237478" required>
            </div>
            <div class="elem-group inlined">
                <label for="checkin-date">Check-in Date</label>
                <input type="date" id="checkin-date" name="checkin" required>
            </div>
            <div class="elem-group">
                <label for="room-selection">PILIH JENIS SERVICE ANDA</label>
                <select id="room-selection" name="room_preference" required>
                    <option value="">PILIH JENIS SERVICE</option>
                    <option value="serviceringan">Service Ringan</option>
                    <option value="serviceberat">Service Berat</option>
                </select>
            </div>
            <div class="elem-group">
                <label for="message">KELUHAN</label>
                <textarea id="message" name="visitor_message" placeholder="Keluhan Anda" required></textarea>
                <button type="submit" name="submit" class="btn">BOOKING</button>
            </div>
        </form>
        <hr>
        <?php
        $localhost = "localhost";
        $username = "root";
        $password = "";
        $database = "lefa";

        $conn = mysqli_connect($localhost, $username, $password, $database);

        include 'function.php';
        if (isset($_POST['submit'])) {
            $nama = $_POST['visitor_name'];
            $phone = $_POST['visitor_phone'];
            $checkin = $_POST['checkin'];
            $jenis_servis = $_POST['room_preference'];
            $keluhan = $_POST['visitor_message'];

            $insert = mysqli_query($conn, "INSERT INTO booking (nama, jenis_servis, keluhan, tanggal) VALUES ('$nama', '$jenis_servis', '$keluhan', '$checkin')");
            if (!$insert) {
                die("Error in query: " . mysqli_error($conn));
            }
        }
        ?>
    </div>
</body>

</html>
