<?php
    include 'templates/header.php';
   // include 'modelo.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ventas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<!-- Contenido de la Página -->
<div class="container mt-4">
    <!-- Sección de Ventas -->
    <div class="row">
        <div class="col-md-6">
            <!-- Campo Cliente y Botones Agregar Cliente y Agregar Fondo -->
            <div class="form-group">
                <label for="cliente">CLIENTE (ingrese número de cédula):</label>
                <input type="text" class="form-control" id="cliente" placeholder="Ingrese número de cédula">
                
                    <button type="button" class="btn btn-warning btn-block">Agregar Fondo</button>
                
            </div>
            <div class="form-group">
                <label for="producto">CODIGO O PRODUCTO (Escanee o escriba el código de barra o nombre del producto):</label>
                <input type="text" class="form-control" id="producto" placeholder="Ingrese código o nombre del producto">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-block">Agregar Cliente</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-warning btn-block">Agregar Fondo</button>
                </div>
            </div>

            <!-- Div Fondos Disponibles -->
            <div class="mt-3">
                <div>Fondos Disponibles:</div>
                <button type="button" class="btn btn-warning">Usar</button>
            </div>

            <!-- Div Deuda -->
            <div class="mt-3">
                <div>Deuda:</div>
                <button type="button" class="btn btn-warning">Usar</button>
            </div>
        </div>

        <!-- Campo Código o Producto -->
        
    </div>

    <!-- Tabla de Ventas -->
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Ingrese código"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese descripción"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese cantidad"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese precio"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese total"></td>
                    </tr>
                    <!-- Puedes agregar más filas según sea necesario -->
                </tbody>
            </table>

            <!-- Botones Guardar Venta, Cancelar Venta, Guardar Crédito -->
            <div class="float-right">
                <button type="button" class="btn btn-success">Guardar Venta (F1)</button>
                <button type="button" class="btn btn-danger">Cancelar Venta (F5)</button>
                <button type="button" class="btn btn-warning">Guardar Crédito (F10)</button>
            </div>

            <!-- Comentarios -->
            <div class="mt-3">
                <label for="comentarios">COMENTARIOS:</label>
                <textarea class="form-control" id="comentarios" rows="2" placeholder="Escriba un comentario"></textarea>
            </div>
        </div>
    </div>

    <!-- Tabla Total Bs y Total $ -->
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>TOTAL Bs.:</strong></td>
                        <td><input type="text" class="form-control" readonly value="500.00"></td>
                        <td><strong>TOTAL $:</strong></td>
                        <td><input type="text" class="form-control" readonly value="50.00"></td>
                    </tr>
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
