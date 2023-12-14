<?php
    session_start();
    include 'templates/header.php';
    include 'modelo.php';
    //	$id = $_GET['id'];
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
            <div id="productos-agregados">
				<table id="tabla-productos" class="table">
				    <thead>
				        <tr>
				            <th>CÓDIGO</th>
				            <th>DESCRIPCIÓN</th>
				            <th>CANTIDAD</th>
				            <th>PRECIO Bs</th>
				            <th>TOTAL</th>
				        </tr>
				    </thead>
				    <tbody id="tbody-productos">
				            <!-- Aquí se mostrarán los productos -->

				    </tbody>
				</table>
			</div>
            <!-- Botones Guardar Venta, Cancelar Venta, Guardar Crédito -->
            <div class="float-right">
			<button type="button" class="btn btn-success" onclick="mostrarProductosEnBoton()">Guardar Venta (F1)</button>
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
                    <td style='text-align:center;'><?= $fila['descripcion']?></td>
                    <td><?= $fila['precioGanUSD']?></td>
                    <td><?= $precioBs= round($tasaDCosto * $fila['precioGanUSD'],2)?></td>
                    <td><?= $fila['existencia']?></td>
                    <td><?= $fila['codigo']?></td>
    <!-- Otros campos -->
    		<td><a href="javascript:void(0);" onclick="agregarProductoSeleccionado('<?= $fila['codigo']?>', '<?= $fila['descripcion']?>', '<?= $fila['precioGanUSD']?>', '<?= $precioBs ?>', '<?= $fila['existencia']?>')">Seleccionar</a></td>
                </tr>
                
                <?php } ?>
                </tbody>
            </table>

        </div>

    </div>
    <button class="close-button" onclick="closePopup()">X</button>

<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>

<script>
// Array para almacenar los productos seleccionados
var productosSeleccionados = [];

// Función para mostrar la ventana emergente al presionar F8
document.addEventListener('keydown', function(event) {
    if (event.key === 'F8') {
        document.getElementById('popup').style.display = 'block';
    }
});

// Función para cerrar la ventana emergente
function closePopup() {
    document.getElementById('popup').style.display = 'none';
    //mostrarProductosAgregados(); // Mostrar productos agregados en la ventana emergente

}
    // Función para agregar el producto seleccionado al array
function agregarProductoSeleccionado(codigo, descripcion, precioUSD, precioBs, existencia) {
    var productoExistente = productosSeleccionados.find(producto => producto.codigo === codigo);

    if (productoExistente) {
        // El producto ya existe en el array, actualizar la cantidad
        productoExistente.cantidadPedido += 1; // Incrementar la cantidad, puedes establecer la cantidad como desees
    } else {
        // El producto no existe en el array, agregarlo
        var producto = {
            codigo: codigo,
            descripcion: descripcion,
            cantidadPedido: "", // Inicializa la cantidad en 1
            precioUSD: precioUSD,
            precioBs: precioBs,
            existencia: existencia,
            costoTotal: 1 // Inicializa la cantidad en 1
        };
        productosSeleccionados.push(producto);
    }

    closePopup();
    mostrarProductosAgregados();
}

function mostrarProductosAgregados() {
    var tbodyProductos = document.getElementById('tbody-productos');
    tbodyProductos.innerHTML = ''; // Limpiar contenido anterior

    for (var i = 0; i < productosSeleccionados.length; i++) {
        var producto = productosSeleccionados[i];
        var fila = document.createElement('tr');
        var costoTotal = (producto.cantidadPedido * producto.precioBs); // Redondear a dos decimales


        fila.innerHTML = `
            <td><input type="text" class="form-control codigo" value="${producto.codigo}" readonly></td>
            <td><input type="text" class="form-control descripcion" value="${producto.descripcion}" readonly></td>
            <td><input type="text" class="form-control cantidad" placeholder="Ingrese Cantidad" value="${producto.cantidadPedido}" oninput="actualizarCantidad(${i}, this) , calcularCostoTotal(${i}, this)"></td>
            <td><input type="text" class="form-control precioBs" value="${producto.precioBs}" readonly></td>
            <td><input type="text" class="form-control costoTotal" value="${costoTotal}" readonly></td>
            <td><button type="button" class="btn btn-danger" onclick="eliminarFila(${i})">Eliminar</button></td>

        `;

        tbodyProductos.appendChild(fila);

        actualizarCantidad(i, fila.querySelector('.cantidad'));
        //calcularCostoTotal(i, fila.querySelector('.costoTotal'));
    }
}

// Función para eliminar una fila por índice
function eliminarFila(index) {
    productosSeleccionados.splice(index, 1); // Elimina el elemento del array
    mostrarProductosAgregados(); // Vuelve a mostrar la tabla actualizada
}


function calcularCostoTotal(index, input) {
    var cantidad = input.value;
    var row = input.parentNode.parentNode;
    var precioBs = row.querySelector('.precioBs').value;

    // Calcula el costo total y lo muestra en el campo correspondiente
    row.querySelector('.costoTotal').value = (parseFloat(precioBs) * parseInt(cantidad)) || 0;

    if(row.querySelector('.costoTotal').value != 0){
		productosSeleccionados[index].costoTotal = row.querySelector('.costoTotal');
    }else productosSeleccionados[index].costoTotal = 0;
    

}

function actualizarCantidad(index, input) {
    var cantidad = parseInt(input.value);
    productosSeleccionados[index].cantidadPedido = cantidad;

    //alert(productosSeleccionados[index].cantidadPedido);
    //alert(index);
}

function mostrarProductosEnBoton() {
    var botonGuardarVenta = document.querySelector('.btn-success');
    var textoBoton = 'Guardar Venta (F1): ';

    for (var i = 0; i < productosSeleccionados.length; i++) {
        var producto = productosSeleccionados[i];

		if (typeof producto.cantidadPedido === 'number' && producto.cantidadPedido > 0) {
            // Si la cantidad es un número y mayor que cero
            var c = parseFloat(producto.costoTotal.value);
            var ce = c.toFixed(2);
            textoBoton += `Código: ${producto.codigo}, Cantidad: ${producto.cantidadPedido}, Costo: ${ce} - `;
                // Asignar el texto con la información de los productos al botón
    		
        } else {
            // Si la cantidad no es un número válido o es menor o igual a cero
            // Manejo del error o mensaje de advertencia
            alert('La cantidad ingresada no es válida para el producto con código: ' + producto.codigo);
            // También podrías lanzar una alerta, mostrar un mensaje, etc.
        }
    }
        botonGuardarVenta.textContent = textoBoton;
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


