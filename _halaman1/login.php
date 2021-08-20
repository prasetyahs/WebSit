<?php
$setTemplate = false;
session_start();
include('../database/koneksi.php');
?>
<!doctype html>
<html lang="en">

<head>
	<title>Login/Wahana Multi Logistik</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../assets/templates/UserLte/Tlogin/css/style.css">

</head>

<body>
	<?php
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") {
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-7">
					<div class="login-wrap">
						<form action="../helpers/cek_login.php" method="POST" class="signin-form d-md-flex">

							<div class="half p-4 py-md-5">
								<div class="w-100">
									<h3 class="mb-4">Sign In</h3>
								</div>
								<div class="form-group mt-3">
									<label class="label">Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username" id="username" required>
								</div>
								<div class="form-group">
									<label class="label">Password</label>
									<input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
							</div>
							<div class="half p-4 py-md-5 bg-primary">
								<div class="form-group">
									<input type="submit" class="form-control btn btn-secondary rounded submit px-3" value="LOGIN">Sign in</input>
								</div>
								<!-- <p class="w-100 text-center" style="color:white;">&mdash; Or Sign In With &mdash;</p> -->
								<a class="w-100 text-center"  href="login-kurir.php" style="color: white;">Login Kurir</a>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="register.php">Create Account?</a>
									</div>
								</div>
								<p class="w-100 text-center" style="color:white;">&mdash; Or Sign In With &mdash;</p>
								<div class="w-100">
									<p class="social-media d-flex justify-content-center">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>