<?php
// Conectar a la base de datos
require 'includes/database.php';

// Consultar todos los productos
$query = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Productos</title>
    <link rel="stylesheet" href="build/css/style.css">
    <style>
        /* Estilos para la ventana emergente (Modal) oculta por defecto */
        .modal { 
            display: none; /* Oculto inicialmente */
            position: fixed; 
            z-index: 1; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            background-color: rgba(0,0,0,0.5); /* Fondo oscuro semitransparente */
        }
        .modal-content { 
            background-color: #fefefe; 
            margin: 10% auto; /* Centrado en la pantalla */
            padding: 20px; 
            border-radius: 8px;
            width: 80%; 
            max-width: 500px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .close { 
            color: #aaa; 
            float: right; 
            font-size: 28px; 
            font-weight: bold; 
            cursor: pointer; 
        }
        .close:hover { color: black; }
        .detalle-item { margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .detalle-item strong { display: inline-block; width: 130px; }
    </style>
</head>
<body>
    <h1>Inventario de Productos</h1>
    
    <a href="crear.php">Crear Nuevo Producto</a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['categoria']; ?></td>
                <td>$<?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['stock']; ?></td>
                <td>
                    <button onclick="abrirModal(<?php echo $producto['id']; ?>)">Ver Detalles</button>
                    
                    <a href="editar.php?id=<?php echo $producto['id']; ?>">Editar</a>
                    <a href="eliminar.php?id=<?php echo $producto['id']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                </td>
            </tr>

            <div id="modal-<?php echo $producto['id']; ?>" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="cerrarModal(<?php echo $producto['id']; ?>)">&times;</span>
                    <h2>Detalles del Producto</h2>
                    <div class="detalle-item"><strong>ID:</strong> <?php echo $producto['id']; ?></div>
                    <div class="detalle-item"><strong>Nombre:</strong> <?php echo $producto['nombre']; ?></div>
                    <div class="detalle-item"><strong>Categoría:</strong> <?php echo $producto['categoria']; ?></div>
                    <div class="detalle-item"><strong>Precio:</strong> $<?php echo $producto['precio']; ?></div>
                    <div class="detalle-item"><strong>Stock:</strong> <?php echo $producto['stock']; ?> unidades</div>
                    <div class="detalle-item"><strong>Descripción:</strong> <?php echo $producto['descripcion']; ?></div>
                    <div class="detalle-item"><strong>Marca:</strong> <?php echo $producto['marca']; ?></div>
                    <div class="detalle-item"><strong>Proveedor:</strong> <?php echo $producto['proveedor']; ?></div>
                    <div class="detalle-item"><strong>Peso:</strong> <?php echo $producto['peso']; ?> kg</div>
                    <div class="detalle-item"><strong>Color:</strong> <?php echo $producto['color']; ?></div>
                    <div class="detalle-item"><strong>Fecha de Ingreso:</strong> <?php echo $producto['fecha_ingreso']; ?></div>
                </div>
            </div>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        // Función para mostrar el modal del ID correspondiente
        function abrirModal(id) {
            document.getElementById('modal-' + id).style.display = 'block';
        }

        // Función para ocultar el modal del ID correspondiente al darle a la "X"
        function cerrarModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
        }

        // Función extra: cerrar el modal si el usuario hace clic fuera de la tarjeta blanca
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>