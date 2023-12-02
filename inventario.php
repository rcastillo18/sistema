<?php
    include 'templates/header.php';
   // include 'modelo.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<!-- Contenido de la Página -->
<div class="container mt-4">
    <!-- Sección de Inventario -->
    <div class="row">
        <!-- Tabla de Productos Existentes -->
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Costo (USD)</th>
                        <th>% Ganancia</th>
                        <th>Precio (USD)</th>
                        <th>Tasa Bs (costo)</th>
                        <th>Precio Bs</th>
                        <th>Existencia</th>
                        <th>Categoría</th>
                        <th>Comentarios</th>
                        <th>Cant Min ALERTA</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Puedes agregar filas dinámicamente aquí -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
