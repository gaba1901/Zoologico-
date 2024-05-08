<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo_ingresado = $_POST['codigo'];

    // Obtener el último código de verificación registrado
    $sql_select = "SELECT * FROM codigos_verificacion ORDER BY fecha_creacion DESC LIMIT 1";
    $result = $conn->query($sql_select);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $codigo_db = $row['codigo'];

        // Validar si el código ingresado coincide con el último código de la base de datos
        if ($codigo_ingresado === $codigo_db) {
            // Reiniciar la sesión
            session_destroy();
            session_start();
            $_SESSION['codigo_validado'] = true;
            header("Location: ../Contra_nueva.php");
            exit(); // ¡Importante!
        } else {
            header("Location: ../Contra_nueva.php");
        }
    } else {
        echo "No se encontró ningún código de verificación en la base de datos.";
    }
}
