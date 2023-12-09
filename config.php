<?php
    include 'modelo.php';
    $resultadoConfiguracion = mostrarConfig();

    if (!$resultadoConfiguracion['error']) {
        $configuracion = $resultadoConfiguracion['configuracion'];
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
    <!-- Sección de Configuración -->
    <div class="row">
        <div class="col-md-12">
            <h2>Configuración</h2>
            <form action="modelo.php" method="POST">
                <!-- Tabla de Tasa del $ BCV y Tasa del $ Paralelo -->
                <table class="table">
                    <tbody>
                        <?php foreach ($configuracion as $fila): ?>
                            <input type="hidden" id="idConfiguracion" name="idConfiguracion" value="<?php echo $fila['idConfiguracion']; ?>">
                            <tr>
                                <td><strong>Tasa Dólar Costo:</strong></td>
                                <td><input type="text" id="tasaDolarCosto" name="tasaDolarCosto" value="<?php echo $fila['tasaDolarCosto']; ?>"></td>
                                <th>Tasa del $ Paralelo</th>
                            </tr>
                            <tr>
                                <td><strong>Tasa Dólar Venta:</strong></td>
                                <td><input type="text" id="tasaDolarVenta" name="tasaDolarVenta" value="<?php echo $fila['tasaDolarVenta']; ?>"></td>
                                <th>Tasa del $ BCV</th>
                            </tr>
                            <!-- ... (otros campos) ... -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="hidden" name='accion_ingreso' value='actualizar_Configuracion'>
                <button type="submit" class="btn btn-primary" >Guardar tasas</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>