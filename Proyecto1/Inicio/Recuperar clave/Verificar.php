<?php
include 'Conector/index1.php';
?>

<!doctype html>
<html lang="en">

<head>
    <title>Recuperar clave</title>
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
                    <h2 class="heading-section">Recuperar clave</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/bg-2.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h2 class="mb-4">Ingrese el código</h2>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end"></p>
                                </div>
                            </div>
                            <form action="Conector/index1.php" method="POST">
                                <p>Verifique su correo electrónico</p>
                                <div class="form-group mb-3">
                                    <label class="label" for="codigo">Código de verificación:</label>
                                    <input type="number" class="form-control" name="codigo" id="codigo" placeholder="Codigo" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Verificar</button>
                                </div>
                            </form>
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