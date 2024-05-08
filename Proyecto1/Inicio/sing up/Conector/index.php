<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['Nombre'];
    $Usuario = $_POST['Usuario'];
    $Correo = $_POST['Correo'];
    $Clave = $_POST['Clave'];
    $Clave_ad = $_POST['Clave_ad'];

    // Verificar si el correo ya existe en la tabla de usuarios
    $sql_check_email = "SELECT * FROM usuarios WHERE correo = '$Correo'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        echo "El correo electrónico ya está registrado en la base de datos.";
    } else {
        // Verificar si hay clave ad y si es correcta según la tabla Clave_ad1
        if (!empty($Clave_ad)) {
            $sql_check_clave_ad = "SELECT * FROM Clave_ad1 WHERE Clave_ad = '$Clave_ad'";
            $result_check_clave_ad = $conn->query($sql_check_clave_ad);

            if ($result_check_clave_ad->num_rows > 0) {
                // Si la clave ad es correcta, asignar rol 1 al usuario
                $rol = 1;
            } else {
                // Si la clave ad no es correcta, o está vacía, asignar rol 0 al usuario
                $rol = 0;
            }
        } else {
            // Si no se proporciona clave ad, asignar rol 0 al usuario
            $rol = 0;
        }

        // Insertar la información del nuevo usuario en la tabla de usuarios
        $sql_insert_user = "INSERT INTO usuarios (nombre, nombre_usuario, contraseña, rol, correo) VALUES ('$nombre_usuario', '$Usuario','$Clave' , '$rol', '$Correo')";

        if ($conn->query($sql_insert_user) === TRUE) {
            header("Location: ../../login/index.php");
        } else {
            echo "Error al crear el usuario: " . $conn->error;
        }
    }
}
?>
