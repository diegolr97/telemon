<?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$observacion=$_POST['areaObservacion'];


$consulta="UPDATE lineapersona SET observacion='$observacion' WHERE idLinea='$codigo' and activo='Si'";
$resultado= mysqli_query($conexion, $consulta);
    
if($resultado){
    echo '<script language="javascript"> alert("Se ha guardado la observacion"); window.location="home.html"; </script>';
}


//conectar a la base de datos



mysqli_close($conexion);



?>