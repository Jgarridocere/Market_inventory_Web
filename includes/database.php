<?php
$conexion = mysqli_connect('localhost', 'root', '', 'tienda_crud');

if (!$conexion) {
    echo "Error: No se pudo conectar a MySQL.";
    exit;
}
?>