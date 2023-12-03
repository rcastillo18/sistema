<?php 
  include 'modelo.php';

  $inventario = mostrarProductos();
  $config= mostrarConfig();
  foreach ($config as $filas) {
      $tasaDCosto = $filas['tasaDolarCosto'];
      $tasaDVenta = $filas['tasaDolarVenta'];
  }

 // echo $tasaDCosto;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- DataTables CSS (Bootstrap 4) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <style>
        .custom-table {
            margin-left: 0; /* Establece el margen izquierdo a 0 */
        }
    </style>
</head>
<body>

<!-- Contenido de la Página -->
<div class="container mt-4 custom-table">
    <!-- Sección de Inventario -->
    <div class="row">
        <!-- Tabla de Productos Existentes -->
        <div class="col-md">
            <table id="table" class="table table-striped table-bordered custom-table" style="width:10%">
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
                        <th>Cant Min ALERTA</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($inventario as $fila) { ?>
                <tr>
                    <td><?= $fila['codigo']?></td>
                    <td><?= $fila['descripcion']?></td>
                    <td><?= $fila['costoUSD']?></td>
                    <td><?= $fila['porcentajeG']?></td>
                    <td><?= $fila['precioGanUSD']?></td>
                    <td><?= $tasaDCosto?></td>
                    <td><?= $precioBs= round($tasaDCosto * $fila['precioGanUSD'],2)?></td>
                    <td><?= $fila['existencia']?></td>
                    <td><?= $fila['categoria']?></td>
                    <td><?= $fila['cantidadAlerta']?></td>
                    <td style='text-align:center;'><a href="<?='editar_reprogramada.php?id=' . $fila['idProducto'] ?>">EDITAR DATOS</a></td>
                </tr>
                
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Popper.js (Bootstrap dependency) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Bootstrap JS (Bootstrap dependency) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- DataTables JS (Bootstrap 4) -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>

</body>
</html>


