<?php
// Obtener el nombre del restaurante desde la URL
$restaurante = isset($_GET['restaurante']) ? $_GET['restaurante'] : '';

// Verificar si el restaurante es válido (para evitar XSS o problemas de seguridad)
$restaurante = htmlspecialchars($restaurante);

// Mostrar el formulario
echo "<h1>Reserva en $restaurante</h1>";
?>
<form action="confirmar_M07_UF4_AE8.php" method="POST">
    <label for="restaurante">Restaurante:</label>
    <input type="text" id="restaurante" name="restaurante" value="<?= $restaurante ?>" <?= $restaurante ? 'disabled' : '' ?>><br><br>

    <label for="fecha">Fecha de la reserva:</label>
    <input type="date" id="fecha" name="fecha" required><br><br>

    <label for="personas">Número de personas:</label>
    <input type="number" id="personas" name="personas" required><br><br>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="nombre">Nombre para la reserva:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <button type="submit">Confirmar Reserva</button>
</form>
