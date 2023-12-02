<!DOCTYPE html>
<html>
<head>
    <title>División de página con Frameset (sin barras de desplazamiento)</title>
</head> 
<frameset rows="7%, 70%" border="0">
    <frame src="templates/header.php" scrolling="no"> <!-- Contenido de la fila superior -->

    <frameset cols="30%, 70%" border="1" noresize>
        <frame src="registrarProductos.php" scrolling="auto"> <!-- Contenido de la columna izquierda -->
        <frame src="inventario.php" scrolling="yes"> <!-- Contenido de la columna derecha -->
    </frameset>
    <noframes>
        <body>
            <p>Este navegador no soporta frames.</p>
        </body>
    </noframes>
</frameset>
</html>
