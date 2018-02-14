<?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$text=$_POST['textAreaObservacion'];

//conectar a la base de datos
$consulta="INSERT INTO observaciones (idLinea, descripcion, fecha) VALUES ('$codigo', '$text','".date('Y-m-d H:i:s')."')";
$resultado= mysqli_query($conexion, $consulta);

if($resultado){
    echo '<script language="javascript"> alert("Se ha añadido la observacion correctamente"); window.location="home.html"; </script>';
}else{
    printf("Errormessage: %s\n", $conexion->error);
}


mysqli_close($conexion);



?>