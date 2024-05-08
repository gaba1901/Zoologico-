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
    $nombre_usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Sanitizar datos para prevenir inyecciones SQL
   # $nombre_usuario = $conn->real_escape_string($nombre_usuario);
   # $contraseña = $conn->real_escape_string($contraseña);

    $sql = "SELECT * FROM Usuarios WHERE nombre_usuario='$nombre_usuario' AND contraseña='$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $row['id_usuario'];
        $_SESSION['nombre_usuario'] = $row['nombre_usuario']; // Guardar el nombre de usuario en la sesión
        $_SESSION['rol_usuario'] = $row['rol']; // Guardar el rol de usuario en la sesión
        
        // Redirigir según el rol del usuario
        if ($row['rol'] == 1) {
            header("Location: Administrador.php");
        } else {
            header("Location: usuario.php");
        }
    }else{
        header("Location: ../index.php");
    }
    
}
?>
