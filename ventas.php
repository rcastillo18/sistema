<?php
    session_start();
    include 'templates/header.php';
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
        <div id="busquedaProductosDiv" style="display: none">
    <label for="searchProducto">Buscar Producto:</label>
    <input type="text" class="form-control" id="searchProducto" placeholder="Ingrese el producto" oninput="buscarProductos(this.value)">

    <ul id="listaProductos" class="list-group">
        <!-- Aquí se mostrarán los productos en tiempo real -->
    </ul>
</div>
    </div>
</div>


<script>
    function buscarProductos(termino) {
        // Aquí puedes implementar la lógica para buscar productos en tiempo real
        // Puedes usar AJAX para consultar tu función mostrarProductos() con el término de búsqueda
        // y actualizar dinámicamente la lista de productos en la página
        // A continuación, hay un ejemplo simple que asume que mostrarProductos() devuelve un array de objetos con 'descripcion' y 'precioGanUSD'

        // Simulación de la función mostrarProductos() con algunos productos de ejemplo
        var productos = [
            { descripcion: 'Producto 1', precioGanUSD: 20.00 },
            { descripcion: 'Producto 2', precioGanUSD: 25.00 },
            { descripcion: 'Producto 3', precioGanUSD: 30.00 }
            // Agrega más productos según sea necesario
        ];

        var listaProductos = document.getElementById('listaProductos');
        listaProductos.innerHTML = '';

        // Filtra los productos que coinciden con el término de búsqueda
        var productosFiltrados = productos.filter(function (producto) {
            return producto.descripcion.toLowerCase().includes(termino.toLowerCase());
        });

        // Agrega los productos filtrados a la lista
        productosFiltrados.forEach(function (producto) {
            var listItem = document.createElement('li');
            listItem.className = 'list-group-item';
            listItem.textContent = producto.descripcion + ' - Precio: $' + producto.precioGanUSD.toFixed(2);
            listaProductos.appendChild(listItem);
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('keydown', function (event) {
        // Verifica si la tecla presionada es 'F8' y al mismo tiempo 'Ctrl' está presionado
        if (event.key === 'F8') {
            event.preventDefault();
            mostrarBusquedaProductos();
        }
    });

    function mostrarBusquedaProductos() {
        // Aquí puedes agregar lógica para mostrar el modal o la sección con el campo de búsqueda y la lista de productos
        // Puedes usar Bootstrap para un modal o simplemente mostrar y ocultar un div en la página
        // Aquí hay un ejemplo simple usando un div en la página:

        var busquedaProductosDiv = document.getElementById('busquedaProductosDiv');
        busquedaProductosDiv.style.display = 'block';




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
