<?php
session_start();
if(isset($_SESSION['usuario_id']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['rol_usuario'])){
    echo "<h3>Bienvenido ".$_SESSION['nombre_usuario']."</h3>"; // Mostrar el nombre de usuario
    echo "<p>Rol: ";
    echo ($_SESSION['rol_usuario'] == 1) ? "Administrador" : "Usuario Normal"; // Mostrar el rol del usuario
    echo "</p>";
    echo "<a href='cerrar_sesion.php'>Cerrar Sesión</a>"; // Mostrar el enlace para cerrar sesión
} else {
    echo "Error: No se ha iniciado sesión correctamente";
}
?>
