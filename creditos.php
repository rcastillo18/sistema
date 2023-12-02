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
    <!-- Sección de Créditos -->
    <div class="row">
        <div class="col-md-12">
            <h2>Créditos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Código/Cédula</th>
                        <th>Nombre</th>
                        <th>Productos/Cantidad</th>
                        <th>Total a Pagar ($)</th>
                        <th>Comentarios</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de fila -->
                    <tr>
                        <td>2023-11-30</td>
                        <td>123456789</td>
                        <td>Maria Rodriguez</td>
                        <td>Producto A / 2</td>
                        <td>$150.00</td>
                        <td>Crédito aprobado</td>
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
