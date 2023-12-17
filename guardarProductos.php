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

// Realizar las operaciones que necesites con los datos, como almacenarlos en la base de datos, etc.
// Ejemplo:
// Conectar a la base de datos
// Ejecutar consultas para insertar los datos en la tabla 'venta' u otras operaciones según sea necesario

// Responder a la petición AJAX (puede ser un mensaje de éxito, error, etc.)
echo "Datos recibidos correctamente.";
?>
