<?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$telefonoL=$_POST['telefonoLLineaModificar'];
$telefonoC=$_POST['telefonoCLineaModificar'];
$tarifa=$_POST['TarifaLinea'];

//conectar a la base de datos
$consulta="UPDATE linea SET telefonoL='$telefonoL', telefonoC='$telefonoC', tarifa='$tarifa' WHERE idLinea='$codigo'";
$resultado= mysqli_query($conexion, $consulta);

if($resultado){
    echo '<script language="javascript"> alert("Se ha modificado la linea correctamente"); window.location="home.html"; </script>';
}else{
    echo "error al modificar la persona";
}

mysqli_close($conexion);



?>