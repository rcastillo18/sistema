<?php
//include 'conexion.php';
//include 'security.php';
include 'modelo.php';

  $productos = mostrarVentas();
  $numero = count($productos);
//
if ($numero == 0){
    $numero = $numero + 1;
    $aux = $numero;
} else{
foreach($productos as $row){
    $row['idVenta'];
    };

    for ($i = 0; $i <= $numero ; $i++) {
      $aux = $row[$i]+1;
    
    if ($numero == $aux) {
       $aux = $row[$i]+2;
    }else
    break;
    }
}

//$conexion = conectar();//en conexion.php

session_start();
// Recibir los datos enviados por la petición AJAX
$productosRecibidos = $_POST['productos'];


// Decodificar los datos JSON recibidos
$productosDecodificados = json_decode($productosRecibidos, true);
// Muestra el contenido de $productosDecodificados
echo '<pre>';
var_dump($productosDecodificados); // Opcionalmente, puedes usar print_r($productosDecodificados);
echo '</pre>';

$numeroVenta = obtenerProximoNumeroVenta(); // Obtener el próximo número de venta
// Ahora $productosDecodificados contiene los datos que estaban en productosSeleccionados de JavaScript
// Mostrar cada atributo de cada producto usando foreach
foreach ($productosDecodificados as $producto) {
    echo "Código: " . $producto['codigo'] . "<br>";
    echo "Descripción: " . $producto['descripcion'] . "<br>";
    echo "Cantidad Pedido: " . $producto['cantidadPedido'] . "<br>";
    echo "numero de venta: " . $numeroVenta . "<br>";
    echo "Precio USD: " . $producto['precioUSD'] . "<br>";
    echo "Precio Bs: " . $producto['precioBs'] . "<br>";
    echo "Existencia: " . $producto['existencia'] . "<br>";

    if (is_array($producto['costoTotal'])) {
        echo "Costo Total eee: ";
        foreach ($producto['costoTotal'] as $costo) {
            echo $costo . " "; // Mostrar cada elemento del array separado por espacio
        }
        echo "<br><br>";
    } else {
        echo "Costo: " . $producto['costoTotal'] . "<br><br>";
    }
        $idVenta = obtenerProximoIdVenta(); //$aux;//($_POST['idCedula']);
      //  $numeroVenta = $producto['numeroVenta'];
        $idCedula = $_SESSION['cedula'];//($_POST['idCedula']);
        $idProducto = $producto['codigo'];//($_POST['saldoDisBs']);
        $cantidadPedido = $producto['cantidadPedido'];
        $totalPagar = $producto['costoTotal'];//($_POST['saldoDisDol']);
        $fecha = date("Y/m/d");//($_POST['deuda']);
        $deudaCredito = 0;//($_POST['pagoDeudaDol']);
        //$comentario = $producto['comentario'];//"sin comentario";//strtoupper($_POST['comentarios']);
        $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : "sin comentario"; // Si el comentario no está presente, establecer un valor predeterminado

        agregarV($idVenta, $numeroVenta ,$idCedula ,$idProducto, $cantidadPedido ,$totalPagar, $fecha, $deudaCredito, $comentario); 


}


// Responder a la petición AJAX (puede ser un mensaje de éxito, error, etc.)
echo "Datos recibidos correctamente.";

function obtenerProximoNumeroVenta() {
    // Conectar a la base de datos (ajusta los detalles de la conexión según tu configuración)
    global $conexion;

    // Consulta SQL para obtener el máximo número de venta
    $consulta = "SELECT MAX(numeroVenta) AS maxNumeroVenta FROM venta";
    
    try {
        $st = $conexion->prepare($consulta);
        $st->execute();
        $resultado = $st->fetch(PDO::FETCH_ASSOC);

        // Obtener el resultado de la consulta
        $maxNumeroVenta = $resultado['maxNumeroVenta'];

        // Incrementar el último número de venta para obtener el próximo número
        $proximoNumeroVenta = $maxNumeroVenta + 1;

        // Retornar el próximo número de venta
        return $proximoNumeroVenta;
    } catch (PDOException $e) {
        // Manejar errores si ocurren durante la ejecución de la consulta
        echo "Error al obtener el próximo número de venta: " . $e->getMessage();
        return false;
    }
}

// Resto de tu código...

function obtenerProximoIdVenta() {
    // Conectar a la base de datos (ajusta los detalles de la conexión según tu configuración)
    global $conexion;

    // Consulta SQL para obtener el último ID de venta
    $consulta = "SELECT MAX(idVenta) AS maxIdVenta FROM venta";
    
    try {
        $st = $conexion->prepare($consulta);
        $st->execute();
        $resultado = $st->fetch(PDO::FETCH_ASSOC);

        // Obtener el resultado de la consulta
        $maxIdVenta = $resultado['maxIdVenta'];

        // Incrementar el último ID de venta para obtener el próximo ID
        $proximoIdVenta = $maxIdVenta + 1;

        // Retornar el próximo ID de venta
        return $proximoIdVenta;
    } catch (PDOException $e) {
        // Manejar errores si ocurren durante la ejecución de la consulta
        echo "Error al obtener el próximo ID de venta: " . $e->getMessage();
        return false;
    }
}
        
?>
