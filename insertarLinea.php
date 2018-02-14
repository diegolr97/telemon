<?php
include("conexion.php");
$telefonoL=$_POST['telefonoL'];
$telefonoC=$_POST['telefonoC'];
$tarifa=$_POST['tarifa'];

//conectar a la base de datos
$consulta="INSERT INTO linea (telefonoL, telefonoC, enUso, disponible, fechaInicioLinea, tarifa) VALUES ('$telefonoL', '$telefonoC', 'No','Si','".date('Y-m-d H:i:s')."', $tarifa)";
$resultado= mysqli_query($conexion, $consulta);


if($resultado){
    echo '<script language="javascript"> alert("Se ha añadido una Linea Nueva"); window.location="home.html"; </script>';
}else{
    echo "error al regisrar una Linea";
}


mysqli_close($conexion);



?>