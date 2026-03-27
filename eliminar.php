<?php
require 'includes/database.php';


$id = $_GET['id'];


if ($id) {
    
    $query = "DELETE FROM productos WHERE id = $id";
    
    
    $resultado = mysqli_query($conexion, $query);

   
    if ($resultado) {
        header('Location: index.php');
        exit;
    }
}
?>
