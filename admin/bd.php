<?php

$servidor="localhost";
$baseDeDatos="c1712233_LPAut";
$usuario="c1712233_LPAut";
$contraseña="ziFOneru49";






try{  //try nos sirve para verificar la conexion

    $conexion=new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña );    //PDO es ua herramienta que nos permite conectarnos a la base de datos, el host va a ser el nombre del servidor

    //echo "Conexion realizada"

}catch(Exception $error){  //hago la variable para que no marque el error  y el cath sirve en caso que se cometa un error
    echo $error->getMessage();    //utilizo un parametro que se llama mensaje
}

