<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="login.css"> 
	<title>Login & Logout PHP</title>
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">

				<?php
				if(isset($_SESSION['error'])) {
				?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $_SESSION['error']?>
				</div>
				<?php
				}
				?>

				<?php
				if(isset($_SESSION['logout'])) {
				?>
				<div class="alert alert-success" role="alert">
				  <?php echo $_SESSION['logout']?>
				</div>
				<?php
				}
				?>


<div class="wrapper">
    <div class="form-box login">
        <h2>Login</h2>
        <form action="process.php" method="post">
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="mail"></ion-icon></span>
					<input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="username" autocomplete="off">
                <label>username</label>

            </div>  
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon>
                </span>
               
				<input type="password" name="password" class="form-control" id="password" placeholder="Password">
				<label>password</label>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="login-register">
            <p>belum punya akun?<a href="register.php" class="register-link">Daftar</a></p>
            </div>
        </form>
    </div>
</div>
</body>
