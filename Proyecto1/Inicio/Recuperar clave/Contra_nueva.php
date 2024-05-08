<?php
include 'Conector/index2.php';
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);
// Obtener el correo electrónico del último registro en la tabla codigos_verificacion
$sql_last_email = "SELECT correo FROM codigos_verificacion ORDER BY id_codigo DESC LIMIT 1";
$result_last_email = $conn->query($sql_last_email);
if ($result_last_email->num_rows > 0) {
    $row = $result_last_email->fetch_assoc();
    $correo_usuario = $row['correo'];

    // Obtener el nombre de usuario asociado al correo electrónico obtenido
    $sql_user_name = "SELECT nombre FROM usuarios WHERE correo = '$correo_usuario'";
    $result_user_name = $conn->query($sql_user_name);
    if ($result_user_name->num_rows > 0) {
        $row_user = $result_user_name->fetch_assoc();
        $nombre_usuario = $row_user['nombre'];
    } else {
        $nombre_usuario = "Usuario Desconocido";
    }
} else {
    $nombre_usuario = "Usuario Desconocido";
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Cambiar clave</title>
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
                    <h2 class="heading-section">Cambiar clave</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/bg-3.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h2 class="mb-4">Ingrese nueva clave</h2>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end"></p>
                                </div>
                            </div>
                            <form action="Conector/index2.php" method="POST" onsubmit="showAlert();">
                                <p>Ingrese nueva clave para</p>
                                <div class="form-group mb-3">
                                <label class="label" for="nombre_usuario"><?php echo $nombre_usuario; ?></label>    
                                    <input type="text" class="form-control" name="clave" id="clave" placeholder="Contraseña" required>
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
    <script>
    // Función para mostrar la alerta y redirigir después de 3 segundos
    function showAlert() {
        alert("Contraseña cambiada exitosamente");
        window.location.href = "Conector/index2.php"; // Redirige a la página deseada
    }
</script>

</body>

</html>
