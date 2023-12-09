<?php
    session_start();
    include 'templates/header.php';
    include 'modelo.php';
    $id = $_GET['id'];
    $inventario = mostrarProductos();
    $config= mostrarConfigu();
    $consultarI = consultarInventario($id);
    while ($fila = $consultarI) {
        $fila['idProducto'];
        $fila['codigo'];
        $fila['descripcion'];
        $fila['precioGanUSD'];
        break;
    }
  foreach ($config as $filas) {
    $tasaDCosto = $filas['tasaDolarCosto'];
    $tasaDVenta = $filas['tasaDolarVenta'];
  }
   // include 'modelo.php';
// Verificar si la variable de sesión está definida
$cedulaEncontrada = isset($_SESSION['cedulaEncontrada']) ? $_SESSION['cedulaEncontrada'] : false;
//echo $_SESSION['cedulaEncontrada'];

// Restablecer la variable de sesión
unset($_SESSION['cedulaEncontrada']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ventas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        /* Estilos para la ventana emergente */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 40px;
            width: 60%;
            max-width: 800px;
            max-height: 80%; /* Establece una altura máxima */
            background-color: #fff;
            border: 2px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            overflow: auto; /* Agrega barras de desplazamiento cuando sea necesario */
        }

        /* Estilos para el botón de cerrar */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Contenido de la Página -->
<div class="container mt-4">
    <!-- Sección de Ventas -->
    <div class="row">
        <div class="col-md-6">
            <!-- Campo Cliente y Botones Agregar Cliente y Agregar Fondo -->
            <div class="form-group">
                <?php if($cedulaEncontrada == true){ ?> 
                    <label for="cliente">CLIENTE (ingrese número de cédula):</label>
                    <input type="text" class="form-control" id="cliente" value="<?php echo $_SESSION['cedula']; ?>" onkeydown="verificarCedula(event)">
                    <button type="button" class="btn btn-warning btn-block">Agregar Fondo</button>
                <?php }
                else{ ?> 
                    <label for="cliente">CLIENTE (ingrese número de cédula):</label>
                    <input type="text" class="form-control" id="cliente" placeholder="Ingrese número de cédula" onkeydown="verificarCedula(event)">
                    <button type="button" class="btn btn-warning btn-block" disabled>Agregar Fondo</button>
                <?php }
                //echo $cedulaEncontrada;
                ?>           
                
            </div>
            <div class="form-group">
                <label for="producto">CODIGO O PRODUCTO (Escanee o escriba el código de barra o nombre del producto):</label>
                <input type="text" class="form-control" id="producto" placeholder="Ingrese código o nombre del producto">
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
            <?php	if ($id >= 1){ ?>
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

                    <!--<tr>
                        <td><input type="text" class="form-control" value="<?php //echo $fila['codigo']; ?>"></td>
                        <td><input type="text" class="form-control" value="<?php //echo $fila['descripcion']; ?>"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese cantidad"></td>
                        <td><input type="text" class="form-control" value="<?php //echo $fila['precioGanUSD']; ?>"></td>
                        <td><input type="text" class="form-control" placeholder="Costo Total"></td>
                    </tr>-->
	                    <?php 
	                    for ($i=0; $i < 1; $i++) { 
	                    	tablaP();

	                    }
	                     ?>

                    <!-- Puedes agregar más filas según sea necesario -->
                </tbody>
             <?php   } else { ?>
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
	                        <td><input type="text" class="form-control" placeholder="Costo Total"></td>
	                    </tr>
	             	<thead>
	                    <!-- Puedes agregar más filas según sea necesario -->
	                </tbody>
             <?php   } ?>
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

<div class="popup" id="popup" scrolling = "auto" >
    <div class="container mt-4 custom-table">
    <!-- Sección de Inventario -->
    <div class="row">
        <!-- Tabla de Productos Existentes -->
        <div class="col-md">
            <table id="table" class="table table-striped table-bordered custom-table" style="width:100%">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descripción</th>
                        <th>Precio (USD)</th>
                        <th>Precio Bs</th>
                        <th>Existencia</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($inventario as $fila) { ?>
                <tr>
                    <td><?= $fila['codigo']?></td>
                    <td style='text-align:center;'><a href="<?='ventas.php?id=' . $fila['idProducto'] ?>"><?= $fila['descripcion']?></a></td>
                    <td><?= $fila['precioGanUSD']?></td>
                    <td><?= $precioBs= round($tasaDCosto * $fila['precioGanUSD'],2)?></td>
                    <td><?= $fila['existencia']?></td>
                </tr>
                
                <?php } ?>
                </tbody>
            </table>

        </div>

    </div>
    <button class="close-button" onclick="closePopup()">X</button>
</div>
    <?php function tablaP() { ?>
					<tr>
                        <td><input type="text" class="form-control" value="<?php echo $fila['codigo']; ?>"></td>
                        <td><input type="text" class="form-control" value="<?php echo $fila['descripcion']; ?>"></td>
                        <td><input type="text" class="form-control" placeholder="Ingrese cantidad"></td>
                        <td><input type="text" class="form-control" value="<?php echo $fila['precioGanUSD']; ?>"></td>
                        <td><input type="text" class="form-control" placeholder="Costo Total"></td>
                    </tr>
    <?php } ?>
</div>

<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>

<script>
// Función para mostrar la ventana emergente al presionar F8
document.addEventListener('keydown', function(event) {
    if (event.key === 'F8') {
        document.getElementById('popup').style.display = 'block';
    }
});

// Función para cerrar la ventana emergente
function closePopup() {
    document.getElementById('popup').style.display = 'none';
}
</script>


<script>
    function verificarCedula(event) {
        // Verificar si la tecla presionada es "INTRO" (código 13)
        if (event.keyCode === 13) {
            // Obtener el valor de la cédula
            var cedula = document.getElementById('cliente').value;

            // Realizar la verificación en PHP (puedes usar AJAX o redirigir a un script PHP)
            // En este ejemplo, se redirige a un script PHP llamado verificar_cedula.php
            window.location.href = 'verificar_cedula.php?cedula=' + cedula;

           //console.log( window.location.href);
        }
    }

    function redirectToFormCliente() {
        // Redirige a formCliente.php
        window.location.href = 'formClientes.php';
    }

</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


