<?php
session_start();

// Verificar si la contraseña ya ha sido cambiada en esta sesión
if (isset($_SESSION['contrasenia_cambiada'])) {
    echo "La contraseña ya ha sido cambiada en esta sesión.";
    exit();
}

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
    // Buscar el último registro en la tabla codigos_verificacion
    $sql_last_code = "SELECT * FROM codigos_verificacion ORDER BY fecha_creacion DESC LIMIT 1";
    $result_last_code = $conn->query($sql_last_code);
    
    if ($result_last_code->num_rows > 0) {
        // Obtener el correo del último registro
        $row = $result_last_code->fetch_assoc();
        $correo = $row['correo'];
        
        // Buscar al usuario correspondiente en la tabla usuarios
        $sql_check_email = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $result_check_email = $conn->query($sql_check_email);

        if ($result_check_email->num_rows == 1) {
            // Obtener la nueva contraseña enviada desde contra_nueva.php
            $nueva_clave = $_POST['clave'];
            
            // Actualizar la contraseña del usuario
            $sql_update_password = "UPDATE usuarios SET contraseña = '$nueva_clave' WHERE correo = '$correo'";
            
            if ($conn->query($sql_update_password) === TRUE) {
                // Marcar la contraseña como cambiada en esta sesión
                $_SESSION['contrasenia_cambiada'] = true;

                // Redirigir al usuario al formulario de inicio de sesión
                header("Location: ../../login/index.php");
                exit(); // ¡Importante!
            } else {
                echo "Error al actualizar la contraseña: " . $conn->error;
            }
        } else {
            echo "El correo del último registro de código de verificación no existe en nuestra base de datos de usuarios.";
        }
    } else {
        echo "No se encontraron registros de códigos de verificación en la base de datos.";
    }
}

?>
