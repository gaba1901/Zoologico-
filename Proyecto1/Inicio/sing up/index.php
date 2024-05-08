<!doctype html>
<html lang="en">

<head>
	<title>Registrarse</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Registrarse</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/bg-1.jpg);">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Registrarse</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
									</p>
								</div>
							</div>
							<form action="./Conector/index.php" class="signin-form" method="POST">
								<div class="form-group mb-3">
									<label class="label" for="name">Nombre</label>
									<input type="text" name="Nombre" class="form-control" placeholder="Nombre" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="name">Usuario</label>
									<input type="text" name="Usuario" class="form-control" placeholder="Usuario" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="name">Correo</label>
									<input type="email" name="Correo" class="form-control" placeholder="Correo" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Contraseña</label>
									<input type="password" name="Clave" class="form-control" placeholder="Contreña" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="name">Clave ad</label>
									<input type="text" name="Clave_ad" class="form-control" placeholder="Clave ad">
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
										In</button>
								</div>
							</form>
							<p class="text-center">Ya te uniste?<a href="../login/index.php">Iniciar sesion</a>
							<p class="text-center"><a href="/index.html">Volver</a>
							</p>
						</div>
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