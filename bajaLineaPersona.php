<?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$fecha=$_POST['fBajaInsertarLineaPersona'];

//conectar a la base de datos
$consulta="UPDATE lineaPersona set activo='No' WHERE idLinea='$codigo'";
$resultado= mysqli_query($conexion, $consulta);
$consulta2="UPDATE linea set disponible='Si', enUso='No' WHERE idLinea='$codigo'";
$resultado2= mysqli_query($conexion, $consulta2);
$consulta3="UPDATE lineapersona set fBaja='$fecha' WHERE idLinea='$codigo'";
$resultado3= mysqli_query($conexion, $consulta3);

if($resultado2){
    echo '<script language="javascript"> alert("Se ha dado de baja correctamente"); window.location="home.html"; </script>';
}else{
    printf("Errormessage: %s\n", $conexion->error);
}

mysqli_close($conexion);



?>