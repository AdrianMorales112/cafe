<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $person = htmlspecialchars($_POST['person']);

    // Validar que todos los campos estén completos
    if (empty($name) || empty($email) || empty($date) || empty($time) || empty($person)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Contenido del correo
    $to = $email;
    $subject = "Confirmación de Reservación";
    $message = "Hola $name,\n\nTu reservación ha sido confirmada:\n- Fecha: $date\n- Hora: $time\n- Personas: $person\n\n¡Gracias por reservar con nosotros!";
    $headers = "From: tu_correo@tudominio.com";

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        echo "Reservación confirmada. Se ha enviado un correo de confirmación.";
    } else {
        echo "Hubo un error al enviar el correo. Intenta de nuevo.";
    }
}
?>
