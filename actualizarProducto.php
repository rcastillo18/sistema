<?php 
    include 'modelo.php';
    $consultarP = consultarProducto($id);

    while ($fila = $consultarP) {
        $fila['idProducto'];
        $fila['codigo'];
        $fila['descripcion'];
        $fila['costoUSD'];
        $fila['porcentajeG'];
        $fila['categoria'];
        $fila['precioGanUSD'];
        $fila['cantidadIngresar'];
        $fila['cantidadAlerta'];
        $fila['existencia'];
        break;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            font-size: 16px; /* Puedes ajustar este valor según sea necesario */
            line-height: 0.4; /* Ajusta el interlineado según tus preferencias */
            margin: 0; /* Establece el margen de la página en 0 */
            padding: 0; /* Establece el relleno de la página en 0 */
        }

        h4.card-title {
            font-size: 17px; /* Puedes ajustar este valor según sea necesario */
            margin-bottom: 0; /* Elimina el margen inferior del título */
        }

        .tabla-productos {
            font-size: 14px; /* Puedes ajustar este valor según sea necesario */
        }

        .form-control {
            font-size: 14px; /* Puedes ajustar este valor según sea necesario */
        }
    </style>
    <script> function confirmacion(){
            var respuesta = confirm("Confirme si desea Actualizar este producto?");
            if (respuesta==true) {
                return true;
            }else {
                return false;
            }
    }
    </script>
</head>
<body>

<!-- Contenido de la Página -->
<div class="container">
    <!-- Sección de Inventario -->
    <div class="row">
        <div class="col-md-6">
            <!-- Formulario para Registrar un Nuevo Producto -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Actualizar Producto</h4>
                </div>
                <div class="card-body">
                    <form form action="modelo.php" method="POST">
                        <div class="form-group">
                            <label for="codigo">Código:</label>
                            <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto']; ?>">
                            <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $fila['codigo']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" rows="2" value="<?php echo $fila['descripcion']; ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="costo">Costo (USD):</label>
                            <input type="text" class="form-control" id="costoUSD" name="costoUSD" value="<?php echo $fila['costoUSD']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ganancia"> % de Ganancia:</label>
                            <input type="text" class="form-control" id="porcentajeG" name="porcentajeG" value="<?php echo $fila['porcentajeG']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $fila['categoria']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="cantidadIngresar">Cantidad a Ingresar:</label>
                            <input type="text" class="form-control" id="cantidadIngresar" name="cantidadIngresar" value="<?php echo $fila['cantidadIngresar']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="cantidadAlerta">Cantidad Mínima para Alerta:</label>
                            <input type="text" class="form-control" id="cantidadAlerta" name="cantidadAlerta" value="<?php echo $fila['cantidadAlerta']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="existencia">Cantidad en existencia:</label>
                            <input type="text" class="form-control" id="existencia" name="existencia" value="<?php echo $fila['existencia']; ?>">
                        </div>
                        <button type="button" class="btn btn-warning">Limpiar</button>
                        <input type="hidden" name='accion_ingreso' value='actualizar_Producto'>
                        <button onclick="return confirmacion()" type="submit" class="btn btn-success">Guardar</button>
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
