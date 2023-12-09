<?php
// verificar_cedula.php
include 'modelo.php';
session_start();

// Verificar si se proporciona una cédula
if (isset($_GET['cedula'])) {
    $cedula = $_GET['cedula'];
    $_SESSION['cedula'] = $cedula;

    // Obtener la información de todos los clientes
    $clientes = mostrarClientes();

    // Inicializar una variable para verificar si se encuentra la cédula
    $cedulaEncontrada = false;

    // Recorrer la lista de clientes y verificar la cédula
    foreach ($clientes as $cliente) {
        if ($cliente['idCedula'] == $cedula) {
            $cedulaEncontrada = true;
            header("Location: ventas.php");
            // Puedes almacenar los datos del cliente si los necesitas
            $_SESSION['cedulaEncontrada'] = true;

            break; // No es necesario seguir buscando si encontramos la cédula
        }
    }

    // Si la cédula no fue encontrada, establecer la variable de sesión en false
    if (!$cedulaEncontrada) {
        $_SESSION['cedulaEncontrada'] = false;
        // Redirigir a formClientes.php
        header("Location: formClientes.php");
        exit();
    }
} else {
    // Si no se proporciona una cédula, redirigir a formClientes.php
    header("Location: pru.php");
    exit();
}
?>
