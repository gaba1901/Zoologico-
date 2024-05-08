<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Proyecto\Inicio\vendor\autoload.php';

$mail = new PHPMailer(true);

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
    // Obtener el correo electrónico del formulario 
    $correo = $_POST['correo'];

    // Verificar si el correo existe en la tabla usuarios
    $sql_check_email = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        // Generar código de verificación aleatorio de 6 dígitos
        $codigo = mt_rand(100000, 999999);

        // Insertar código en la base de datos
        $sql_insert = "INSERT INTO codigos_verificacion (codigo, correo, fecha_creacion) VALUES ('$codigo', '$correo', NOW())";

        if ($conn->query($sql_insert) === TRUE) {
            // Aquí agregarías el código para enviar el correo electrónico
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'tucorreo404@gmail.com';
                $mail->Password = 'ikms ptpp hziv byvw';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('tucorreo404@gmail.com', 'ZooWord');
                $mail->addAddress($correo, 'Codigo de verificacion');
                $mail->isHtml(true);
                $mail->Subject = 'Codigo de verificacion';
                $mail->Body = '
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            text-align: center;
                        }
                        .container {
                            max-width: 600px;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #fff;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        .message {
                            font-size: 18px;
                            margin-top: 20px;
                        }
                        .code {
                            font-size: 24px;
                            font-weight: bold;
                            color: #007bff;
                            margin-top: 20px;
                            text-align: center;
                        }
                        img {
                            max-width: 100%;
                            margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <h1>Código de verificación</h1>
                        <p class="message">Aquí tienes tu código de verificación:</p>
                        <p class="code">'.$codigo.'</p>
                        <img src="https://images.unsplash.com/photo-1497752531616-c3afd9760a11?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Imagen" />
                    </div>
                </body>
                </html>
            ';
                $mail->send();
                header("Location: ../Verificar.php");
                exit;
            } catch (Exception $e) {
                echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
            }
        }
    }
}
