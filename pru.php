<!DOCTYPE html>
<html>
<head>
    <title>División de página con Frameset (sin barras de desplazamiento)</title>
</head> 
<frameset cols="30%, 70%">
    <frame src="registrarProductos.php" scrolling="no"> <!-- Contenido de la columna izquierda -->
    <frame src="columna_derecha.html" scrolling="no"> <!-- Contenido de la columna derecha -->
    <noframes>
        <body>
            <p>Este navegador no soporta frames.</p>
        </body>
    </noframes>
</frameset>
</html>

