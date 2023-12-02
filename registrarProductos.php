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
        <div class="col-md-6">
            <!-- Formulario para Registrar un Nuevo Producto -->
            <div class="card">
                <div class="card-header">
                    <h4>Registrar Nuevo Producto</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="codigo">Código:</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Ingrese el código">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" rows="2" placeholder="Ingrese la descripción"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="costo">Costo (USD):</label>
                            <input type="text" class="form-control" id="costo" placeholder="Ingrese el costo">
                        </div>
                        <div class="form-group">
                            <label for="ganancia"> % de Ganancia:</label>
                            <input type="text" class="form-control" id="ganancia" placeholder="Ingrese el porcentaje de ganancia">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <input type="text" class="form-control" id="categoria" placeholder="Ingrese la categoría">
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad a Ingresar:</label>
                            <input type="text" class="form-control" id="cantidad" placeholder="Ingrese la cantidad">
                        </div>
                        <div class="form-group">
                            <label for="comentarios">Comentarios:</label>
                            <textarea class="form-control" id="comentarios" rows="2" placeholder="Ingrese comentarios"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="min_alerta">Cantidad Mínima para Alerta:</label>
                            <input type="text" class="form-control" id="min_alerta" placeholder="Ingrese la cantidad mínima para alerta">
                        </div>
                        <button type="button" class="btn btn-warning">Limpiar</button>
                        <button type="button" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
