<?php
include("conexion.php");
$codigo=$_GET['codigo'];

//conectar a la base de datos
$consulta="DELETE FROM persona WHERE idPersona='$codigo'";
$resultado= mysqli_query($conexion, $consulta);

if($resultado){
    echo '<script language="javascript"> alert("Se ha eliminado la persona correctamente"); window.location="home.php"; </script>';
}else{
    echo "error al eliminar la persona";
}

mysqli_close($conexion);



?>