<?php
// Recibir los datos enviados por la petición AJAX
$productosRecibidos = $_POST['productos'];

// Decodificar los datos JSON recibidos
$productosDecodificados = json_decode($productosRecibidos, true);
// Muestra el contenido de $productosDecodificados
echo '<pre>';
var_dump($productosDecodificados); // Opcionalmente, puedes usar print_r($productosDecodificados);
echo '</pre>';

// Ahora $productosDecodificados contiene los datos que estaban en productosSeleccionados de JavaScript
// Mostrar cada atributo de cada producto usando foreach
foreach ($productosDecodificados as $producto) {
    echo "Código: " . $producto['codigo'] . "<br>";
    echo "Descripción: " . $producto['descripcion'] . "<br>";
    echo "Cantidad Pedido: " . $producto['cantidadPedido'] . "<br>";
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
}


// Responder a la petición AJAX (puede ser un mensaje de éxito, error, etc.)
echo "Datos recibidos correctamente.";
?>
