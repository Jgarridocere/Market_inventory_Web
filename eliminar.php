<?php
require 'includes/database.php';

// Atrapamos el ID que viene en la URL
$id = $_GET['id'];

// Verificamos que realmente haya un ID antes de intentar borrar
if ($id) {
    // Instrucción SQL para borrar el registro específico
    $query = "DELETE FROM productos WHERE id = $id";
    
    // Ejecutamos la petición en la base de datos
    $resultado = mysqli_query($conexion, $query);

    // Si tuvo éxito, redireccionamos a la pantalla principal
    if ($resultado) {
        header('Location: index.php');
        exit;
    }
}
?>