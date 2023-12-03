<?php
    include 'modelo.php';
    $consultarC = consultarCliente($id);
    while ($fila = $consultarC) {
        $fila['idCedula'];
        $fila['nombre'];
        $fila['saldoDisDol'];
        $fila['saldoDisBs'];
        $fila['deuda'];
        $fila['pagoDeudaDol'];
        $fila['comentarios'];
        $fila['telefono'];
        break;
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulario de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h2>Formulario de Clientes</h2>
            <form action="modelo.php" method="post">
                <div class="form-group">
                    <label for="idCedula">Cédula:</label>
                    <input type="text" class="form-control" id="idCedula" name="idCedula" value="<?php echo $fila['idCedula']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="comentarios">Comentario:</label>
                    <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono">
                </div>
                <input type="hidden" name='accion_ingreso' value='actualizar_Clientes'>
                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
