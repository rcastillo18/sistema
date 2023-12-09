<?php
include 'conexion.php';
include 'security.php';
//include 'header.php';

$conexion = conectar();//en conexion.php

$id = NULL;

$accion = NULL;

if(isset($_GET['id'])){
    $id = $_GET['id'];

}
   # echo $id;
if(isset($_GET['accion_ingreso'])){
    $accion = $_GET['accion_ingreso'];
}

if(isset($_GET['accion'])){
    $accion = $_GET['accion'];
}

if(isset($_POST['accion_ingreso'])){
    $accion = $_POST['accion_ingreso'];
}

switch($accion){

    case 'imagenes':
        $id_AE = ($_GET['id_AE']);
        consultarIMG();
        break;

    case 'subir_Imagen':
        $id_AE = ($_GET['id_AE']);
        $img_1 = ($_GET['img_1']);
        $img_2 = ($_GET['img_2']);
        $img_3 = ($_GET['img_3']);
        imagen($id_AE, $img_1, $img_2, $img_3);
        break;

    case 'modificar_R':
        $id_AR= ($_GET['id_AR']);
        $id_AP = ($_GET['id_AP']);
        $fecha_RegistroR = ($_GET['fecha_RegistroR']);
        $fecha_ActividadR = ($_GET['fecha_ActividadR']);
        $hora_InicioR= ($_GET['hora_InicioR']);
        $hora_FinalR = strtoupper($_GET['hora_FinalR']);
        $observacionesR = strtoupper($_GET['observacionesR']);
        editar_datosR($id_AR ,$id_AP, $fecha_RegistroR, $fecha_ActividadR, $hora_InicioR, $hora_FinalR, $observacionesR);        
        break;

    case 'modificar_E':
        $id_AE= ($_GET['id_AE']);
        $id_AP = ($_GET['id_AP']);
        $hora_InicioE = ($_GET['hora_InicioE']);
        $hora_FinalE = ($_GET['hora_FinalE']);
        $num_Atendidos= ($_GET['num_Atendidos']);
        $num_Atendidas= ($_GET['num_Atendidas']);
        $serv_Entregado = strtoupper($_GET['serv_Entregado']);
        $unidad_Medida = strtoupper($_GET['unidad_Medida']);
        $conclusiones = strtoupper($_GET['conclusiones']);
        $acuerdos = strtoupper($_GET['acuerdos']);
        $observaciones = strtoupper($_GET['observaciones']);
        editar_datosE($id_AE ,$id_AP, $hora_InicioE, $hora_FinalE, $num_Atendidos, $num_Atendidas, $serv_Entregado, $unidad_Medida, $conclusiones, $acuerdos, $observaciones);        
        break;

    case 'actualizar_Configuracion':
        $idEmpresa = ($_POST['idEmpresa']);
        $nombre = strtoupper($_POST['nombre']);
        $rif = ($_POST['rif']);
        $telefono = ($_POST['telefono']);
        $correo = strtoupper($_POST['correo']);
        $direccion = strtoupper($_POST['direccion']);
        $ciudad = strtoupper($_POST['ciudad']);
        $estado = strtoupper($_POST['estado']);
        $codigoPostal = ($_POST['codigoPostal']);
        $mensaje = strtoupper($_POST['mensaje']);
        actualizarConfig($idEmpresa, $nombre, $rif, $telefono, $correo, $direccion, $ciudad, $estado, $codigoPostal, $mensaje); 
        break;

    case 'actualizar_Empresa':
        $idEmpresa = ($_POST['idEmpresa']);
        $nombre = strtoupper($_POST['nombre']);
        $rif = ($_POST['rif']);
        $telefono = ($_POST['telefono']);
        $correo = strtoupper($_POST['correo']);
        $direccion = strtoupper($_POST['direccion']);
        $ciudad = strtoupper($_POST['ciudad']);
        $estado = strtoupper($_POST['estado']);
        $codigoPostal = ($_POST['codigoPostal']);
        $mensaje = strtoupper($_POST['mensaje']);
        actualizarE($idEmpresa, $nombre, $rif, $telefono, $correo, $direccion, $ciudad, $estado, $codigoPostal, $mensaje); 
        break;

    case 'actualizar_Producto':
        $idProducto = ($_POST['idProducto']);
        $codigo = ($_POST['codigo']);
        $descripcion = strtoupper($_POST['descripcion']);
        $costoUSD = ($_POST['costoUSD']);
        $porcentajeG = ($_POST['porcentajeG']);
        $categoria = strtoupper($_POST['categoria']);
        $precioGanUSD = ((($_POST['costoUSD']*($_POST['porcentajeG']))/100)+($_POST['costoUSD']));
        $cantidadIngresar = ($_POST['cantidadIngresar']);
        $cantidadAlerta = ($_POST['cantidadAlerta']);
        $existencia = ($_POST['existencia'] + $_POST['cantidadIngresar']);
        actualizar($codigo, $descripcion, $costoUSD, $porcentajeG, $categoria, $precioGanUSD, $cantidadIngresar, $cantidadAlerta, $existencia, $idProducto); 
        break;

    case 'agregar_Clientes':
        $idCedula = ($_POST['idCedula']);
        $nombre = strtoupper($_POST['nombre']);
        $saldoDisBs = 0;//($_POST['saldoDisBs']);
        $saldoDisDol = 0;//($_POST['saldoDisDol']);
        $deuda = 0;//($_POST['deuda']);
        $pagoDeudaDol = 0;//($_POST['pagoDeudaDol']);
        $comentarios = strtoupper($_POST['comentarios']);
        $telefono = ($_POST['telefono']);
        agregarC($idCedula ,$nombre, $saldoDisBs, $saldoDisDol, $deuda, $pagoDeudaDol, $comentarios, $telefono); 
        break;

    case 'actualizar_Clientes':
        $idCedula = ($_POST['idCedula']);
        $nombre = strtoupper($_POST['nombre']);
        $saldoDisBs = 0;//($_POST['saldoDisBs']);
        $saldoDisDol = 0;//($_POST['saldoDisDol']);
        $deuda = 0;//($_POST['deuda']);
        $pagoDeudaDol = 0;//($_POST['pagoDeudaDol']);
        $comentarios = strtoupper($_POST['comentarios']);
        $telefono = ($_POST['telefono']);
        actualizarC($idCedula ,$nombre, $saldoDisBs, $saldoDisDol, $deuda, $pagoDeudaDol, $comentarios, $telefono);  
        break;


    case 'eliminarP':
        eliminarPlanificada($id);
        break;

    case 'eliminarE':
        eliminarEjecutada($id);
        break;

    case 'eliminarR':
        eliminarReprogramada($id);
        break;

    case 'nuevo_R':
        $id_AR = ($_POST['id_AR']);
        $id_AP = ($_POST['id_AP']);
        $fecha_RegistroR = date("Y/m/d");
        $fecha_ActividadR = ($_POST['fecha_ActividadR']);
        $hora_InicioR = ($_POST['hora_InicioR']);
        $hora_FinalR = ($_POST['hora_FinalR']);
        $observacionesR = strtoupper($_POST['observacionesR']);
        reprogramada($id_AR, $id_AP, $fecha_RegistroR, $fecha_ActividadR, $hora_InicioR, $hora_FinalR, $observacionesR); 
        break;

    case 'nuevo_Producto':
    	$idProducto = ($_POST['idProducto']);
    	$codigo = ($_POST['codigo']);
		$descripcion = strtoupper($_POST['descripcion']);
		$costoUSD = ($_POST['costoUSD']);
		$porcentajeG = ($_POST['porcentajeG']);
		$categoria = strtoupper($_POST['categoria']);
		$precioGanUSD = ((($_POST['costoUSD']*($_POST['porcentajeG']))/100)+($_POST['costoUSD']));
		$cantidadIngresar = ($_POST['cantidadIngresar']);
		$cantidadAlerta = ($_POST['cantidadAlerta']);
		$existencia = ($_POST['cantidadIngresar']);
        productos($idProducto ,$codigo, $descripcion, $costoUSD, $porcentajeG, $categoria, $precioGanUSD, $cantidadIngresar, $cantidadAlerta, $existencia); 
        break;
    case 'nuevo_P':
        $id_AP = ($_POST['id_AP']);
        $id_Usuario = ($_POST['id_Usuario']);
        $fecha_Registro = date("Y/m/d");
        $responsable_Unidad = strtoupper($_POST['responsable_Unidad']);
        $checkboxPO = ($_POST['plan_Operativo']);
        $plan_Operativo = implode(', ', $checkboxPO);
        $nom_Responsable = strtoupper($_POST['nom_Responsable']);
        $nom_Actividad = strtoupper($_POST['nom_Actividad']);
        $nom_Cientifica = strtoupper($_POST['nom_Cientifica']);
        if ($nom_Cientifica == "OTRA") {
            $nom_Cientifica = strtoupper($_POST['ruta_Cientifica']);
        }
        $estado = strtoupper($_POST['estado']);
        $municipio = strtoupper($_POST['municipio']);
        $parroquia = strtoupper($_POST['parroquia']);
        $fecha_Actividad = ($_POST['fecha_Actividad']);
        $hora_Inicio = ($_POST['hora_Inicio']);
        $hora_Final = ($_POST['hora_Final']);
        $objetivo_Actividad = strtoupper($_POST['objetivo_Actividad']);
        $descripcion_Actividad = strtoupper($_POST['descripcion_Actividad']);
        $organizacion_Actividad = strtoupper($_POST['organizacion_Actividad']);
        planificada($id_AP, $id_Usuario, $fecha_Registro, $responsable_Unidad, $plan_Operativo, $nom_Responsable, $nom_Actividad, $nom_Cientifica, $estado, $municipio, $parroquia, $fecha_Actividad, $hora_Inicio, $hora_Final, $objetivo_Actividad, $descripcion_Actividad, $organizacion_Actividad);        
        break;
    case 'ingreso':
        $usuario = validar($_POST['usuario']);
        $password = validar($_POST['password']);
        verificarIngreso($usuario, $password);
        break;
}

function imagen($id_AE, $img_1, $img_2, $img_3){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

        global $conexion;

        try{
             $sql = 'INSERT INTO imagenes(id_AE, img_1, img_2, img_3) VALUES (?,?,?,?)';
            
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $id_AE);
            $st->bindParam(2, $img_1);
            $st->bindParam(3, $img_2);
            $st->bindParam(4, $img_3);
            $st->execute();
           header('location:header.php');    
        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
         }

}

//FUNCIONES PARA ACTIVIDADES REPROGRAMADAS

function reprogramada($id_AR, $id_AP, $fecha_RegistroR, $fecha_ActividadR, $hora_InicioR, $hora_FinalR, $observacionesR){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

        global $conexion;

        try{
             $sql = 'INSERT INTO actividad_reprogramada(id_AR, id_AP, fecha_RegistroR, fecha_ActividadR, hora_InicioR, hora_FinalR, observacionesR) VALUES (?,?,?,?,?,?,?)';
            
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $id_AR);
            $st->bindParam(2, $id_AP);
            $st->bindParam(3, $fecha_RegistroR);
            $st->bindParam(4, $fecha_ActividadR);
            $st->bindParam(5, $hora_InicioR);
            $st->bindParam(6, $hora_FinalR);
            $st->bindParam(7, $observacionesR);
            $st->execute();
           header('location:header.php');    
        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
         }

}

function consultarProducto($id){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
    global $conexion;

    try{
       
        $sql = "SELECT * FROM producto WHERE idProducto = ? ";
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $consultarP = $st->fetch(PDO::FETCH_ASSOC); 
 
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        //echo $e;
    }
    return $consultarP;
}

function editar_datosR($id_AR ,$id_AP, $fecha_RegistroR, $fecha_ActividadR, $hora_InicioR, $hora_FinalR, $observacionesR){ 

    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
        
        $sql = 'UPDATE actividad_reprogramada SET id_AP= ?, fecha_RegistroR= ?, fecha_ActividadR= ?, hora_InicioR= ?, hora_FinalR= ?, observacionesR= ? WHERE id_AR = ? ';
        $st = $conexion->prepare($sql);
            $st->bindParam(1, $id_AP);
            $st->bindParam(2, $fecha_RegistroR);
            $st->bindParam(3, $fecha_ActividadR);
            $st->bindParam(4, $hora_InicioR);
            $st->bindParam(5, $hora_FinalR);
            $st->bindParam(6, $observacionesR);
            $st->bindParam(7, $id_AR);
            $st->execute();

        header('location:modificarR.php');
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e->getMessage();
    }
    
}

function eliminarReprogramada($id){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
    
    global $conexion;
   
   try{
        
        $sql = "DELETE FROM actividad_reprogramada WHERE id_AR = ? ";
        $st = $conexion->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo  $e->getMessage();
    }
    header('location:eliminarR.php');
}
#####
//FUNCIONES PARA ACTIVIDADES EJECUTADAS

function ejecutada($id_AE, $id_AP, $hora_InicioE, $hora_FinalE, $num_Atendidos, $num_Atendidas, $serv_Entregado, $unidad_Medida, $conclusiones, $acuerdos, $observaciones){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

        global $conexion;

        try{
             $sql = 'INSERT INTO actividad_ejecutada (id_AE, id_AP, hora_InicioE, hora_FinalE, num_Atendidos, num_Atendidas, serv_Entregado, unidad_Medida, conclusiones, acuerdos, observaciones) VALUES (?,?,?,?,?,?,?,?,?,?,?)';

            $st = $conexion->prepare($sql);
            $st->bindParam(1, $id_AE);
            $st->bindParam(2, $id_AP);
            $st->bindParam(3, $hora_InicioE);
            $st->bindParam(4, $hora_FinalE);
            $st->bindParam(5, $num_Atendidos);
            $st->bindParam(6, $num_Atendidas);
            $st->bindParam(7, $serv_Entregado);
            $st->bindParam(8, $unidad_Medida);
            $st->bindParam(9, $conclusiones);
            $st->bindParam(10, $acuerdos);
            $st->bindParam(11, $observaciones);
            $st->execute();
            header('location:header.php');    
        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
         }

        $img_1 = $_FILES['img_1']['name'];
        $imagen_tipo1 = $_FILES['img_1']['type'];
        $imagen_tamanio1 = $_FILES['img_1']['size'];
        $imagen_temporal1 = $_FILES['img_1']['tmp_name'];
        $imagen_error1 = $_FILES['img_1']['error'];
    
        if($imagen_error1 === UPLOAD_ERR_OK){
        // Obtener la extensión del archivo
        $imagen_extension1 = pathinfo($img_1, PATHINFO_EXTENSION);
        // Crear un nombre único para el archivo
        $imagen_nuevo_nombre1 = uniqid('imagen1_', true) . '.' . $imagen_extension1;
        // Mover el archivo a la ubicación deseada
        $img_1 = 'images/' . $imagen_nuevo_nombre1;
        move_uploaded_file($imagen_temporal1, $img_1);
        }

        $img_2 = $_FILES['img_2']['name'];
        $imagen_tipo2 = $_FILES['img_2']['type'];
        $imagen_tamanio2 = $_FILES['img_2']['size'];
        $imagen_temporal2 = $_FILES['img_2']['tmp_name'];
        $imagen_error2 = $_FILES['img_2']['error'];

        if($imagen_error2 === UPLOAD_ERR_OK){
        // Obtener la extensión del archivo
        $imagen_extension2 = pathinfo($img_2, PATHINFO_EXTENSION);
        // Crear un nombre único para el archivo
        $imagen_nuevo_nombre2 = uniqid('imagen2_', true) . '.' . $imagen_extension2;
        // Mover el archivo a la ubicación deseada
        $img_2 = 'images/' . $imagen_nuevo_nombre2;
        move_uploaded_file($imagen_temporal2, $img_2);
        } else {
            $img_2 = '-------';
        }

        $img_3 = $_FILES['img_3']['name'];
        $imagen_tipo3 = $_FILES['img_3']['type'];
        $imagen_tamanio3 = $_FILES['img_3']['size'];
        $imagen_temporal3 = $_FILES['img_3']['tmp_name'];
        $imagen_error3 = $_FILES['img_3']['error'];

        if($imagen_error3 === UPLOAD_ERR_OK){
        // Obtener la extensión del archivo
        $imagen_extension3 = pathinfo($img_3, PATHINFO_EXTENSION);
        // Crear un nombre único para el archivo
        $imagen_nuevo_nombre3 = uniqid('imagen3_', true) . '.' . $imagen_extension3;
        // Mover el archivo a la ubicación deseada
        $img_3 = 'images/' . $imagen_nuevo_nombre3;
        move_uploaded_file($imagen_temporal3, $img_3);
        } else {
            $img_3 = '-------';
        }

        // Insertar los datos en la base de datos
        $resultado = imagen($id_AE, $img_1, $img_2, $img_3);

        // Verificar si la inserción fue exitosa
        if($resultado){
            echo 'Los datos se han guardado correctamente.';
        } else {
            echo 'Error al guardar los datos.';
        }
    }


function mostrarInventario(){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
        
        $sql = 'SELECT  id_AE ,id_AP, hora_InicioE, hora_FinalE, num_Atendidos, num_Atendidas, serv_Entregado, unidad_Medida, conclusiones, acuerdos, observaciones FROM actividad_ejecutada ORDER BY id_AE';
        $st = $conexion->prepare($sql);
        $st->execute();
        $inventario = $st->fetchAll();        
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e;
    }
    return $inventario;
}

function consultarEjecutada($id){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
    global $conexion;

    try{
       
        $sql = "SELECT * FROM actividad_ejecutada WHERE id_AE = ? ";
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $ejecutadas = $st->fetch(PDO::FETCH_ASSOC); 
 
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
    }
    return $ejecutadas;
}

function editar_datosE($id_AE ,$id_AP, $hora_InicioE, $hora_FinalE, $num_Atendidos, $num_Atendidas, $serv_Entregado, $unidad_Medida, $conclusiones, $acuerdos, $observaciones){ 

    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
        
        $sql = 'UPDATE actividad_ejecutada SET id_AP=?, hora_InicioE= ?, hora_FinalE= ?, num_Atendidos= ?, num_Atendidas= ?,serv_Entregado= ?, unidad_Medida= ?, conclusiones= ?, acuerdos= ?, observaciones= ? WHERE id_AE = ? ';
        $st = $conexion->prepare($sql);
            $st->bindParam(1, $id_AP);
            $st->bindParam(2, $hora_InicioE);
            $st->bindParam(3, $hora_FinalE);
            $st->bindParam(4, $num_Atendidos);
            $st->bindParam(5, $num_Atendidas);
            $st->bindParam(6, $serv_Entregado);
            $st->bindParam(7, $unidad_Medida);
            $st->bindParam(8, $conclusiones);
            $st->bindParam(9, $acuerdos);
            $st->bindParam(10, $observaciones);
            $st->bindParam(11, $id_AE);
            $st->execute();

        header('location:modificarE.php');
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e->getMessage();
    }
    
}

function eliminarEjecutada($id){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
    
    global $conexion;
   
   try{
        
        $sql = "DELETE FROM actividad_ejecutada WHERE id_AE = ? ";
        $st = $conexion->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();

    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo  $e->getMessage();
    }
    header('location:eliminarE.php');
}

function agregarC($idCedula ,$nombre, $saldoDisBs, $saldoDisDol, $deuda, $pagoDeudaDol, $comentarios, $telefono){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
        global $conexion;

        try{
             $sql = 'INSERT INTO cliente (idCedula ,nombre, saldoDisBs, saldoDisDol, deuda, pagoDeudaDol, comentarios, telefono) VALUES (?,?,?,?,?,?,?,?)';
            
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $idCedula);
            $st->bindParam(2, $nombre);
            $st->bindParam(3, $saldoDisBs);
            $st->bindParam(4, $saldoDisDol);
            $st->bindParam(5, $deuda);
            $st->bindParam(6, $pagoDeudaDol);
            $st->bindParam(7, $comentarios);
            $st->bindParam(8, $telefono);
            $st->execute(); 
            header('location:clientes.php');
         //   echo '<script>
			//	 Recarga todos los frames de la página
			//	 parent.location.reload();
			//	 </script>';

        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
        }
}

function mostrarClientes(){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
        
        $sql = 'SELECT idCedula ,nombre, saldoDisBs, saldoDisDol, deuda, pagoDeudaDol, comentarios, telefono FROM cliente ORDER BY idCedula';
        $st = $conexion->prepare($sql);
        $st->execute();
        $clientes = $st->fetchAll();        
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e;
    }
    return $clientes;	
}

function consultarCliente($id){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
    global $conexion;

    try{
       
        $sql = "SELECT * FROM cliente WHERE idCedula = ? ";
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $consultarC = $st->fetch(PDO::FETCH_ASSOC); 
 
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        //echo $e;
    }
    return $consultarC;
}

function actualizarC($idCedula ,$nombre, $saldoDisBs, $saldoDisDol, $deuda, $pagoDeudaDol, $comentarios, $telefono){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
        global $conexion;

        try{
             $sql = 'UPDATE cliente SET nombre = ?, saldoDisBs = ?, saldoDisDol = ?, deuda = ?, pagoDeudaDol = ?, comentarios = ?, telefono = ? WHERE idCedula = ? ';
            
            $st = $conexion->prepare($sql);
            
            $st->bindParam(1, $nombre);
            $st->bindParam(2, $saldoDisBs);
            $st->bindParam(3, $saldoDisDol);
            $st->bindParam(4, $deuda);
            $st->bindParam(5, $pagoDeudaDol);
            $st->bindParam(6, $comentarios);
            $st->bindParam(7, $telefono);
            $st->bindParam(8, $idCedula);
            $st->execute();

       //     echo '<script>
                 // Recarga todos los frames de la página
       //          parent.location.reload();
       //          </script>';
            header('location:clientes.php');
        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
        }
}

function actualizarConfig($idConfiguracion, $tasaDolarCosto, $tasaDolarVenta, $impresora){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
        global $conexion;

        try{
             $sql = 'UPDATE configuracion SET idConfiguracion = ?, tasaDolarCosto = ?, tasaDolarVenta = ?, impresora = ?';
            
            $st = $conexion->prepare($sql);
            
            $st->bindParam(1, $idConfiguracion);
            $st->bindParam(2, $tasaDolarCosto);
            $st->bindParam(3, $tasaDolarVenta);
            $st->bindParam(4, $impresora);
            $st->execute();

       //     echo '<script>
       //          // Recarga todos los frames de la página
       //          parent.location.reload();
       //          </script>';
            header('location:config.php');
        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
        }
}

function mostrarConfig(){   
    $resultado = [
        'error' => false,
        'mensaje' => '',
        'configuracion' => []  // Inicializar el array para los resultados de la configuración
    ];

    global $conexion;

    try{
        $sql = 'SELECT idConfiguracion, tasaDolarCosto, tasaDolarVenta FROM configuracion ORDER BY idConfiguracion';
        $st = $conexion->prepare($sql);
        $st->execute();
        $resultado['configuracion'] = $st->fetchAll(PDO::FETCH_ASSOC) ?: [];  // Devolver un array vacío si no hay resultados
    } catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        // Puedes comentar o eliminar la siguiente línea si no quieres imprimir el error aquí
        echo $e;
    }
    return $resultado;
}

function mostrarConfigu(){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
        
        $sql = 'SELECT idConfiguracion ,tasaDolarCosto, tasaDolarVenta, impresora FROM configuracion ORDER BY idConfiguracion';
        $st = $conexion->prepare($sql);
        $st->execute();
        $config = $st->fetchAll();        
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
    }
    return $config;
}

function actualizarE($idEmpresa, $nombre, $rif, $telefono, $correo, $direccion, $ciudad, $estado, $codigoPostal, $mensaje){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
        global $conexion;

        try{
             $sql = 'UPDATE empresa SET nombre = ?, rif = ?, telefono = ?, correo = ?, direccion = ?, ciudad = ?, estado = ?, codigoPostal = ?, mensaje = ? WHERE idEmpresa = ? ';
            
            $st = $conexion->prepare($sql);
            
            $st->bindParam(1, $nombre);
            $st->bindParam(2, $rif);
            $st->bindParam(3, $telefono);
            $st->bindParam(4, $correo);
            $st->bindParam(5, $direccion);
            $st->bindParam(6, $ciudad);
            $st->bindParam(7, $estado);
            $st->bindParam(8, $codigoPostal);
            $st->bindParam(9, $mensaje);
            $st->bindParam(10, $idEmpresa);
            $st->execute();

       //     echo '<script>
       //          // Recarga todos los frames de la página
       //          parent.location.reload();
       //          </script>';
            header('location:config.php');
        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
        }
}

function mostrarEmpresa(){   
    $resultado = [
        'error' => false,
        'mensaje' => '',
        'empresa' => []  // Inicializar el array para los resultados de la empresa
    ];

    global $conexion;

    try{
        $sql = 'SELECT idEmpresa, nombre, rif, telefono, correo, direccion, ciudad, estado, codigoPostal, mensaje FROM empresa ORDER BY idEmpresa';
        $st = $conexion->prepare($sql);
        $st->execute();
        $resultado['empresa'] = $st->fetchAll(PDO::FETCH_ASSOC);  // Utilizar PDO::FETCH_ASSOC para obtener un array asociativo
    } catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        // Puedes comentar o eliminar la siguiente línea si no quieres imprimir el error aquí
        echo $e;
    }
    return $resultado;
}

function actualizar($codigo, $descripcion, $costoUSD, $porcentajeG, $categoria, $precioGanUSD, $cantidadIngresar, $cantidadAlerta, $existencia, $idProducto){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
        global $conexion;

        try{
             $sql = 'UPDATE producto SET codigo = ?, descripcion = ?, costoUSD = ?, porcentajeG = ?, categoria = ?, precioGanUSD = ?, cantidadIngresar = ?, cantidadAlerta = ?, existencia = ? WHERE idProducto = ? ';
            
            $st = $conexion->prepare($sql);
            
            $st->bindParam(1, $codigo);
            $st->bindParam(2, $descripcion);
            $st->bindParam(3, $costoUSD);
            $st->bindParam(4, $porcentajeG);
            $st->bindParam(5, $categoria);
            $st->bindParam(6, $precioGanUSD);
            $st->bindParam(7, $cantidadIngresar);
            $st->bindParam(8, $cantidadAlerta);
            $st->bindParam(9, $existencia);
            $st->bindParam(10, $idProducto);
            $st->execute();

            echo '<script>
                 // Recarga todos los frames de la página
                 parent.location.reload();
                 </script>';
            //header('location:modificarE.php');
        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
        }
}
//FUNCIONES PARA ACTIVIDADES PLANIFICADAS

function productos($idProducto, $codigo, $descripcion, $costoUSD, $porcentajeG, $categoria, $precioGanUSD, $cantidadIngresar, $cantidadAlerta, $existencia){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
        global $conexion;

        try{
             $sql = 'INSERT INTO producto (idProducto ,codigo, descripcion, costoUSD, porcentajeG, categoria, precioGanUSD, cantidadIngresar, cantidadAlerta, existencia) VALUES (?,?,?,?,?,?,?,?,?,?)';
            
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $idProducto);
            $st->bindParam(2, $codigo);
            $st->bindParam(3, $descripcion);
            $st->bindParam(4, $costoUSD);
            $st->bindParam(5, $porcentajeG);
            $st->bindParam(6, $categoria);
            $st->bindParam(7, $precioGanUSD);
            $st->bindParam(8, $cantidadIngresar);
            $st->bindParam(9, $cantidadAlerta);
            $st->bindParam(10, $existencia);
            $st->execute(); 
            header('location:pru.php');
           // echo '<script>
				 // Recarga todos los frames de la página
			//	 parent.location.reload();
			//	 </script>';

        }catch(PDOException $e){
            $resultado['error'] = true;
            $resultado['mensaje'] = $e->getMessage();
            echo $e;
        }
}

function mostrarProductos(){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
        
        $sql = 'SELECT idProducto ,codigo, descripcion, costoUSD, porcentajeG, categoria, precioGanUSD, cantidadIngresar, cantidadAlerta, existencia FROM producto ORDER BY idProducto';
        $st = $conexion->prepare($sql);
        $st->execute();
        $productos = $st->fetchAll();        
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e;
    }
    return $productos;	
}

function consultarPlanificada($id){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
    global $conexion;

    try{
       
        $sql = "SELECT * FROM actividad_planificada WHERE id_AP = ? ";
            $st = $conexion->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $planificadas = $st->fetch(PDO::FETCH_ASSOC); 
 
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
    }
    return $planificadas;
}

function editar_datosP($id_AP, $id_Usuario, $fecha_Registro, $responsable_Unidad, $plan_Operativo, $nom_Responsable, $nom_Actividad, $nom_Cientifica, $estado, $municipio, $parroquia, $fecha_Actividad, $hora_Inicio, $hora_Final, $objetivo_Actividad, $descripcion_Actividad, $organizacion_Actividad){ 

    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
        
        $sql = 'UPDATE actividad_planificada SET id_Usuario=?, fecha_Registro=?, responsable_Unidad=?, plan_Operativo=?, nom_Responsable= ?, nom_Actividad= ?, nom_Cientifica= ?, estado= ?, municipio= ?, parroquia= ?, fecha_Actividad= ?, hora_Inicio= ?, hora_Final= ?, objetivo_Actividad= ?, descripcion_Actividad= ?, organizacion_Actividad = ? WHERE id_AP = ? ';
        $st = $conexion->prepare($sql);
            $st->bindParam(1, $id_Usuario);
            $st->bindParam(2, $fecha_Registro);
            $st->bindParam(3, $responsable_Unidad);
            $st->bindParam(4, $plan_Operativo);
            $st->bindParam(5, $nom_Responsable);
            $st->bindParam(6, $nom_Actividad);
            $st->bindParam(7, $nom_Cientifica);
            $st->bindParam(8, $estado);
            $st->bindParam(9, $municipio);
            $st->bindParam(10, $parroquia);
            $st->bindParam(11, $fecha_Actividad);
            $st->bindParam(12, $hora_Inicio);
            $st->bindParam(13, $hora_Final);
            $st->bindParam(14, $objetivo_Actividad);
            $st->bindParam(15, $descripcion_Actividad);
            $st->bindParam(16, $organizacion_Actividad);
            $st->bindParam(17, $id_AP);
            $st->execute();

        header('location:modificarP.php');
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e->getMessage();
    }
    
}

function eliminarPlanificada($id){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];
    
    global $conexion;
   
   try{
        
        $sql = "DELETE FROM actividad_planificada WHERE id_AP = ? ";
        $st = $conexion->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo  $e->getMessage();
    }
    header('location:eliminarP.php');
}

//FUNCION PARA VERIFICAR EL INGRESO AL SISTEMA

function verificarIngreso($usuario, $password){
    global $conexion;
    try{
        $sql = 'SELECT usuario, password, nivel_Acceso, id_Usuario FROM usuario WHERE usuario = ? AND password = ?';
        $st = $conexion->prepare($sql);
        $st->bindParam(1, $usuario);
        $st->bindParam(2, $password);
        $st->execute();
        $datos = $st->fetch(PDO::FETCH_ASSOC);
        if(isset($datos['usuario'])){
            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION['nivel_Acceso'] = $datos['nivel_Acceso'];
            $_SESSION['id_Usuario'] = $datos['id_Usuario'];
            header('location:principal.php');
        }else{
            header('location:index.php?ingreso=' . "error"); 
        }
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo  $e->getMessage();
    }
}
//CUIDADO
function consultarIngreso($id_Usuario){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;
    $id = $_SESSION['id_Usuario'];
    echo $id;

    try{
        $sql = "SELECT * FROM usuario WHERE usuario = ? ";
        $st = $conexion->prepare($sql);
        $st->bindParam(1, $id);
        $st->execute();
        $ingreso = $st->fetch(PDO::FETCH_ASSOC);        
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
    }
    return $ingreso;
}

function consultarAP(){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
    $sql = "SELECT * FROM actividad_planificada"; //hago la consulta a la base de datos
    $st = $conexion->prepare($sql); 
    $st->execute();
    $exportar =  $st->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e->getMessage();
    }
    return $exportar;
}

function consultarAE(){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
    $sql = "SELECT id_AP, hora_InicioE, hora_FinalE, num_Atendidos, num_Atendidas, serv_Entregado, unidad_Medida, conclusiones, acuerdos, observaciones FROM actividad_ejecutada"; //hago la consulta a la base de datos
    $st = $conexion->prepare($sql); 
    $st->execute();
    $exportar = $st->fetchAll(PDO::FETCH_ASSOC); 
     }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e->getMessage();
    }
    return $exportar;
}

function consultarAR(){   
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
    $sql = "SELECT id_AP, fecha_RegistroR, fecha_ActividadR, hora_InicioR, hora_FinalR, observacionesR FROM actividad_reprogramada"; //hago la consulta a la base de datos
    $st = $conexion->prepare($sql); 
    $st->execute();
    $exportar = $st->fetchAll(PDO::FETCH_ASSOC); 
     }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e->getMessage();
    }
    return $exportar;
}

function consultarIMG(){
    $resultado = [
        'error' =>false,
        'mensaje' => ''
    ];

    global $conexion;

    try{
    $sql = "SELECT id_AE, img_1, img_2, img_3 FROM imagenes WHERE id_AE = ?"; //hago la consulta a la base de datos
    $st = $conexion->prepare($sql); 
    $st->bindParam(1, $id);
    $st->execute();
    $exportar = $st->fetchAll(PDO::FETCH_ASSOC); 
     }catch(PDOException $e){
        $resultado['error'] = true;
        $resultado['mensaje'] = $e->getMessage();
        echo $e->getMessage();
    }
    return $exportar;
    header('location:imagenes.php');
}

?>

