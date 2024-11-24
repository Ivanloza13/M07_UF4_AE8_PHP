<?php
// Array de restaurantes
$restaurantes = ["La Parrilla", "Cevichería", "La Gran Muralla", "Sushilandia", "Burritos Mexicanos"];

// Mostrar los restaurantes como enlaces
echo "<h1>Lista de Restaurantes</h1>";
echo "<ul>";
foreach ($restaurantes as $restaurante) {
    echo "<li style='margin-bottom: 10px;'><a href='reserva_M07_UF4_AE8.php?restaurante=" . urlencode($restaurante) . "'>$restaurante</a></li>";
}
echo "</ul>";
?>
