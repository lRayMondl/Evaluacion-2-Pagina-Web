<?php

/* recibe los datos enviados desde el formulario HTML utilizando la superglobal $_POST

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phoneNumber"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $persons = $_POST["persons"];

    
    $to = "tu@email.com";
    $subject = "Nueva reserva de mesa";
    $message = "Nombre: $name\nCorreo electrónico: $email\nTeléfono: $phone\nFecha: $date\nHora: $time\nPersonas: $persons";
    $headers = "From: $email";

    
    mail($to, $subject, $message, $headers);

    
    header("Location: reservacion.html");
    exit;
} else {
    
    header("Location: index.html");
    exit;
} 

*/

/* Realiza funcion mail que envia los correos con los datos ingresados al formulario, realiza validacion desde el servidor y sanea los datos.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario y los sanitiza
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido";
        exit;
    }

    
    $destinatario = "tucorreo@example.com";
    $asunto = "Nuevo mensaje desde el formulario";
    $mensaje = "Nombre: $nombre\nCorreo electrónico: $email";
    $cabeceras = "From: $email";

    
    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        
        header("Location: confirmacion.html");
        exit;
    } else {
        
        echo "Hubo un problema al enviar el correo electrónico";
    }
} else {
    
    header("Location: index.html");
    exit;
}

*/

/* Proteccion CSRF

// Genera un token CSRF único y lo almacena en la sesión
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Verifica si el formulario ha sido enviado y si el token CSRF es válido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // Procesa el formulario
    // ...
    // Luego de procesar el formulario, elimina el token CSRF para evitar reutilización
    unset($_SESSION['csrf_token']);
} else {
    // Si el token CSRF no es válido, muestra un error o redirige a una página de error
    // ...
}

*/