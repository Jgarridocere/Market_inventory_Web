<?php
require 'includes/database.php';

// Atrapamos el ID de la URL
$id = $_GET['id'];

// Buscamos los datos actuales del producto para rellenar el formulario
$query_producto = "SELECT * FROM productos WHERE id = $id";
$resultado_producto = mysqli_query($conexion, $query_producto);
$producto = mysqli_fetch_assoc($resultado_producto);

// ZONA SUPERIOR: Validación y actualización en PHP
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
    if (strlen($nombre) > 100) { $errores[] = "El nombre no puede tener más de 100 caracteres."; }
    if (strlen($categoria) > 50) { $errores[] = "La categoría no puede tener más de 50 caracteres."; }
    if ($precio < 0 || $precio > 99999) { $errores[] = "El precio no puede ser negativo ni mayor a 99,999."; }
    if ($stock < 0 || $stock > 10000) { $errores[] = "El stock no puede ser negativo ni mayor a 10,000."; }
    
    // Si no hay errores, actualizar
    if (empty($errores)) {
        $query = "UPDATE productos SET 
                    nombre = '$nombre', 
                    categoria = '$categoria', 
                    precio = '$precio', 
                    stock = '$stock', 
                    descripcion = '$descripcion', 
                    marca = '$marca', 
                    proveedor = '$proveedor', 
                    peso = '$peso', 
                    color = '$color', 
                    fecha_ingreso = '$fecha_ingreso' 
                  WHERE id = $id";
                  
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
    <title>Editar Producto</title>
    <link rel="stylesheet" href="build/css/style.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <a href="index.php">Volver</a>
    <br><br>

    <?php foreach($errores as $error): ?>
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 10px; border: 1px solid #f5c6cb; border-radius: 5px;">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST">
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" maxlength="100" required value="<?php echo $producto['nombre']; ?>">
        </div>
        <div>
            <label>Categoría:</label>
            <input type="text" name="categoria" maxlength="50" required value="<?php echo $producto['categoria']; ?>">
        </div>
        <div>
            <label>Precio:</label>
            <input type="number" step="0.01" name="precio" min="0" max="99999" required value="<?php echo $producto['precio']; ?>">
        </div>
        <div>
            <label>Stock:</label>
            <input type="number" name="stock" min="0" max="10000" required value="<?php echo $producto['stock']; ?>">
        </div>
        <div>
            <label>Descripción:</label>
            <textarea name="descripcion" maxlength="500"><?php echo $producto['descripcion']; ?></textarea>
        </div>
        <div>
            <label>Marca:</label>
            <input type="text" name="marca" maxlength="50" value="<?php echo $producto['marca']; ?>">
        </div>
        <div>
            <label>Proveedor:</label>
            <input type="text" name="proveedor" maxlength="50" value="<?php echo $producto['proveedor']; ?>">
        </div>
        <div>
            <label>Peso (kg):</label>
            <input type="number" step="0.01" name="peso" min="0" max="1000" value="<?php echo $producto['peso']; ?>">
        </div>
        <div>
            <label>Color:</label>
            <input type="text" name="color" maxlength="30" value="<?php echo $producto['color']; ?>">
        </div>
        <div>
            <label>Fecha de Ingreso:</label>
            <input type="date" name="fecha_ingreso" value="<?php echo $producto['fecha_ingreso']; ?>">
        </div>
        <br>
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>