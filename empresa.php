<?php
    include 'modelo.php';

    $resultadoEmpresa = mostrarEmpresa();

    if (!$resultadoEmpresa['error']) {
        $empresa = $resultadoEmpresa['empresa'];
    }
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="modelo.php" method="POST">
                <h3>Datos de la Empresa</h3>
                <table class="table">
                    <tbody>
                        <?php foreach ($empresa as $fila): ?>
                            <td><input type="hidden" id="idEmpresa" name="idEmpresa" value="<?php echo $fila['idEmpresa']; ?>"></td>
                            <tr>
                                <td><strong>Nombre:</strong></td>
                                <td><input type="text" id="nombre" name="nombre" value="<?php echo $fila['nombre']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>RIF:</strong></td>
                                <td><input type="text" id="rif" name="rif" value="<?php echo $fila['rif']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>Teléfono:</strong></td>
                                <td><input type="text" id="telefono" name="telefono" value="<?php echo $fila['telefono']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>Correo:</strong></td>
                                <td><input type="text" id="correo" name="correo" value="<?php echo $fila['correo']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>Dirección:</strong></td>
                                <td><input type="text" id="direccion" name="direccion" value="<?php echo $fila['direccion']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>Ciudad:</strong></td>
                                <td><input type="text" id="ciudad" name="ciudad" value="<?php echo $fila['ciudad']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>Estado:</strong></td>
                                <td><input type="text" id="estado" name="estado" value="<?php echo $fila['estado']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>Código Postal:</strong></td>
                                <td><input type="number" id="codigoPostal" name="codigoPostal" value="<?php echo $fila['codigoPostal']; ?>"></td>
                            </tr>
                            <tr>
                                <td><strong>Mensaje:</strong></td>
                                <td><input type="text" id="mensaje" name="mensaje" value="<?php echo $fila['mensaje']; ?>"></td>
                            </tr>
                            <!-- ... (otros campos) ... -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="hidden" name='accion_ingreso' value='actualizar_Empresa'>
                <br>
                <button type="submit" class="btn btn-primary">Guardar Empresa</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>