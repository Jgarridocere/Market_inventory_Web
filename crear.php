<?php
require 'includes/database.php';

// ZONA SUPERIOR: Validación y guardado en PHP
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $marca = $_POST['marca'];
    $proveedor = $_POST['proveedor'];
    $peso = $_POST['peso'];
    $color = $_POST['color'];
    $fecha_ingreso = $_POST['fecha_ingreso'];

    // Validaciones
    if (strlen($nombre) > 35) { $errores[] = "El nombre no puede tener más de 100 caracteres."; }
    if (strlen($categoria) > 20) { $errores[] = "La categoría no puede tener más de 50 caracteres."; }
    if ($precio < 0 || $precio > 99999) { $errores[] = "El precio no puede ser negativo ni mayor a 99,999."; }
    if ($stock < 0 || $stock > 10000) { $errores[] = "El stock no puede ser negativo ni mayor a 10,000."; }
    
    $fecha_hoy = date('Y-m-d');
    if ($fecha_ingreso < $fecha_hoy) { $errores[] = "La fecha no puede ser anterior al día de hoy."; }

    // Si no hay errores, guardar
    if (empty($errores)) {
        $query = "INSERT INTO productos (nombre, categoria, precio, stock, descripcion, marca, proveedor, peso, color, fecha_ingreso) 
                  VALUES ('$nombre', '$categoria', '$precio', '$stock', '$descripcion', '$marca', '$proveedor', '$peso', '$color', '$fecha_ingreso')";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            header('Location: index.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="build/css/style.css">
</head>
<body>
    <h1>Crear Nuevo Producto</h1>
    <a href="index.php">Volver</a>
    <br><br>

    <?php foreach($errores as $error): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 10px; border: 1px solid #f5c6cb; border-radius: 5px;">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form id="formulario-producto" method="POST" action="crear.php">
        <div>
            <label>Nombre:</label>
            <input type="text" id="nombre" name="nombre" maxlength="100" required>
        </div>
        <div>
            <label>Categoría:</label>
            <input type="text" id="categoria" name="categoria" maxlength="50" required>
        </div>
        <div>
            <label>Precio:</label>
            <input type="number" step="0.01" id="precio" name="precio" min="0" max="99999" required>
        </div>
        <div>
            <label>Stock:</label>
            <input type="number" id="stock" name="stock" min="0" max="10000" required>
        </div>
        <div>
            <label>Descripción:</label>
            <textarea id="descripcion" name="descripcion" maxlength="500"></textarea>
        </div>
        <div>
            <label>Marca:</label>
            <input type="text" id="marca" name="marca" maxlength="50">
        </div>
        <div>
            <label>Proveedor:</label>
            <input type="text" id="proveedor" name="proveedor" maxlength="50">
        </div>
        <div>
            <label>Peso (kg):</label>
            <input type="number" step="0.01" id="peso" name="peso" min="0" max="1000">
        </div>
        <div>
            <label>Color:</label>
            <input type="text" id="color" name="color" maxlength="30">
        </div>
        <div>
            <label>Fecha de Ingreso:</label>
            <input type="date" id="fecha_ingreso" name="fecha_ingreso" min="<?php echo date('Y-m-d'); ?>">
        </div>
        <br>
        <button type="submit">Guardar Producto</button>
    </form>
</body>
</html>