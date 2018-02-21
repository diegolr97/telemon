<?php
include("conexion.php");
session_start();
$consumo=$_POST['consumo'];
$codigo=$_GET['codigo2'];
$fecha=$_POST['fecha'];

if(empty($consumo) || empty($fecha)){
    echo "<p>rellene todos los datos</p>";
    
    
}else{
    $consulta="INSERT INTO consumo (idLinea, consumo, fecha) VALUES ('".$_SESSION["codigo2"]."', '$consumo', '$fecha')";
    $resultado= mysqli_query($conexion, $consulta);
    
    
}

//conectar a la base de datos



mysqli_close($conexion);



?>