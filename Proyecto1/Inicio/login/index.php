<?php
include '/xampp/htdocs/Proyecto/Inicio/login/Conector/index.php';

?>
<!doctype html>
<html lang="en">
<head>
    <title>Iniciar sesión</title>
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
                <h2 class="heading-section">Iniciar sesión</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Iniciar sesión</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end"></p>
                            </div>
                        </div>
                        <form action="Conector/index.php" method="POST" class="signin-form">
                            <div class="form-group mb-3">
                                <label class="label" for="usuario">Usuario</label>
                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="contraseña">Contraseña</label>
                                <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Iniciar sesión</button>
                            </div>
                        </form>
                        <p class="text-center">¿Olvidaste la clave? <a href="../Recuperar clave/index.php">Recuperar</a></p>
                        <p class="text-center">¿No tienes cuenta? <a href="../sing up/index.php">Registrarse</a></p>
                        <p class="text-center"><a href="../index.html">Volver</a></p>
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

