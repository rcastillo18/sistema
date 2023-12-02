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
        <div class="col-md-12">
            <h2>Inventario</h2>
            
            <!-- Tabla para Registrar Productos -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Costo (USD)</th>
                        <th>% Ganancia</th>
                        <th>Categoría</th>
                        <th>Cantidad a Ingresar</th>
                        <th>Comentarios</th>
                        <th>Cantidad Mínima para Alerta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Ingrese el código"></td>
                        <td><textarea class="form-control" rows="1" placeholder="Ingrese la descripción"></textarea></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese el costo"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese % de ganancia"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese la categoría"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese cantidad a ingresar"></td>
                        <td><textarea class="form-control" rows="1" placeholder="Ingrese comentarios"></textarea></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese cantidad mínima para alerta"></td>
                        <td>
                            <button type="button" class="btn btn-warning">Limpiar</button>
                            <button type="button" class="btn btn-success">Guardar</button>
                        </td>
                    </tr>
                    <!-- Puedes agregar más filas según sea necesario -->
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
