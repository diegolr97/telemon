<?php
include("conexion.php");
$codigo=$_GET['codigo'];

//conectar a la base de datos
$consulta="UPDATE lineaPersona set activo='No' WHERE idLinea='$codigo'";
$resultado= mysqli_query($conexion, $consulta);
$consulta2="UPDATE linea set disponible='No', enUso='No' WHERE idLinea='$codigo'";
$resultado2= mysqli_query($conexion, $consulta2);

if($resultado){
    echo '<script language="javascript"> alert("Se ha eliminado la linea correctamente"); window.location="home.html"; </script>';
}else{
    printf("Errormessage: %s\n", $conexion->error);
}

mysqli_close($conexion);


?>