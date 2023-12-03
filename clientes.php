<?php
    include 'templates/header.php';
    include 'modelo.php';
    $clientes = mostrarClientes(); 
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
    <!-- Sección de Clientes -->
    <div class="row">
        <div class="col-md-12">
            <h2>Clientes</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Saldo Disponible</th>
                        <th>Comentarios</th>
                        <th>Telefono</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($clientes as $fila) { ?>
                <tr>
                    <td><?= $fila['idCedula']?></td>
                    <td><?= $fila['nombre']?></td>
                    <td><?= $fila['saldoDisDol']?></td>
                    <td><?= $fila['comentarios']?></td>
                    <td><?= $fila['telefono']?></td>
                    <td style='text-align:center;'><a href="<?='actualizarCliente.php?id=' . $fila['idCedula'] ?>">EDITAR DATOS</a></td>
                </tr>
                
                <?php } ?>
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
