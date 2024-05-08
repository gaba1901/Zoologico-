<?php
include("../index.php");
session_start();
if(isset($_SESSION['usuario_id'])){
    echo "Existe sesion";
    session_destroy();
    header('location:../index.php');
} else {
    echo "Error: No se ha iniciado sesión correctamente";
}
?>
