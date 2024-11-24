<?php
// Obtener los datos del formulario
$restaurante = isset($_POST['restaurante']) ? trim($_POST['restaurante']) : '';
$fecha = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';
$personas = isset($_POST['personas']) ? trim($_POST['personas']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';

// Validar los datos
$errores = [];
if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ' -]*$/u", $nombre)) {
    $errores[] = "El nombre solo puede contener letras, espacios, apóstrofes y guiones.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
}

if (!DateTime::createFromFormat('Y-m-d', $fecha)) {
    $errores[] = "La fecha no es válida. Usa el formato AAAA-MM-DD.";
} else {
    // Verificar si la fecha es anterior a hoy
    $fecha_reserva = new DateTime($fecha);
    $hoy = new DateTime('today'); // Hoy a las 00:00:00
    if ($fecha_reserva < $hoy) {
        $errores[] = "La fecha de reserva no puede ser anterior a hoy.";
    }
}

if (!filter_var($personas, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
    $errores[] = "El número de personas debe ser un número entero positivo.";
}

// Si no hay errores, redirigir a la página de gracias
if (empty($errores)) {
    header('Location: gracias_M07_UF4_AE8.php');
    exit();
} else {
    // Mostrar errores
    echo "<h1>Error en la reserva</h1>";
    foreach ($errores as $error) {
        echo "<p>" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</p>";
    }
    echo "<a href='reserva_M07_UF4_AE8.php?restaurante=" . urlencode($restaurante) . "'>Volver al formulario</a>";
}
?>
