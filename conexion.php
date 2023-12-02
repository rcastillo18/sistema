<?php

function conectar(){
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'negocio';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];
    $conexion = NULL;

    try{
        $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
        $conexion = new PDO($dsn, $user, $pass, $options);
       // echo "Conexion exitosa!!";
    }catch(PDOException $e){
        echo "Error no fue posible conectarse con la bd " . $dbname . " \nError: " . $e->getMessage();
    }
    return $conexion;
}

 
 