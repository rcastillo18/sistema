<?php
    include 'templates/header.php';
   // include 'modelo.php';
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
    <!-- Sección de Configuración -->
    <div class="row">
        <div class="col-md-12">
            <h2>Configuración</h2>
            
            <!-- Tabla de Tasa del $ BCV y Tasa del $ Paralelo -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Tasa del $ BCV</th>
                        <th>Tasa del $ Paralelo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" value="2,500 Bs."></td>
                        <td><input type="text" value="3,000 Bs."></td>
                    </tr>
                    <!-- Puedes ajustar los valores según sea necesario -->
                </tbody>
            </table>

            <!-- Tabla de Datos de la Empresa -->
            <h3>Datos de la Empresa</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Nombre:</strong></td>
                        <td><input type="text" value="Tu Empresa S.A."></td>
                    </tr>
                    <tr>
                        <td><strong>RIF:</strong></td>
                        <td><input type="text" value="J-12345678-9"></td>
                    </tr>
                    <tr>
                        <td><strong>Teléfono:</strong></td>
                        <td><input type="text" value="(123) 456-7890"></td>
                    </tr>
                    <tr>
                        <td><strong>Correo:</strong></td>
                        <td><input type="text" value="info@tuempresa.com"></td>
                    </tr>
                    <tr>
                        <td><strong>Dirección:</strong></td>
                        <td><input type="text" value="Calle Principal, N° 123"></td>
                    </tr>
                    <tr>
                        <td><strong>Ciudad:</strong></td>
                        <td><input type="text" value="Ciudad Capital"></td>
                    </tr>
                    <tr>
                        <td><strong>Estado:</strong></td>
                        <td><input type="text" value="Estado Ejemplo"></td>
                    </tr>
                    <tr>
                        <td><strong>Código Postal:</strong></td>
                        <td><input type="text" value="12345"></td>
                    </tr>
                    <tr>
                        <td><strong>Mensaje:</strong></td>
                        <td><input type="text" value="Bienvenidos a Tu Empresa"></td>
                    </tr>
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
