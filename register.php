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
	<link rel="stylesheet" href="register.css">
	

	<title>Register Member - PHP</title>
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">

				<?php
if (isset($_SESSION['error'])) {
    ?>
				<div class="alert alert-warning" role="alert">
				  <?php echo $_SESSION['error'] ?>
				</div>
				<?php
}
?>

				<?php
if (isset($_SESSION['message'])) {
    ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $_SESSION['message'] ?>
				</div>
				<?php
}
?>

				<div class="card">
				<div class="form-box login">
       
					<div class="card-body">
						<form action="process-register.php" method="post">
						<h2>DAFTAR DULU</h2>
							<div class="input-box">
								<input type="text" name="nama" class="form-control" id="name" value="<?php echo @$_SESSION['nama'] ?>" aria-describedby="name" placeholder="Nama lengkap" autocomplete="off">
								<label for="username">Nama Lengkap</label>
							</div>

							<div class="input-box">
								<input type="text" name="username" class="form-control" id="username" value="<?php echo @$_SESSION['username'] ?>" aria-describedby="username" placeholder="username" autocomplete="off">
								<label for="username">Username</label>
							</div>

							<div class="input-box">
								<input type="password" name="password" class="form-control" id="password" value="<?php echo @$_SESSION['password'] ?>" placeholder="Password">
								<label for="password">Password</label>
							</div>

							<div class="input-box">
								<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="<?php echo @$_SESSION['password_confirmation'] ?>"  placeholder="Password">
								<label for="password">Konfirmasi Password</label>
							</div>

							<button type="submit" class="btn btn-primary">Register</button>
							<div class="login-register">
                           <p>mau login mank?<a href="login.php" class="register-link">login</a></p>
                          </div>
						</form>
						</div>
                      </div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
</body>
<?php
session_destroy();
?>