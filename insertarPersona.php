<?php
include("conexion.php");
$nombre=$_POST['nombrePersona'];

//conectar a la base de datos
$consulta="INSERT INTO persona (nombre) VALUES ('$nombre')";
$resultado= mysqli_query($conexion, $consulta);

if($resultado){
    echo '<script language="javascript"> alert("Se ha añadido una persona correctamente"); window.location="home.html"; </script>';
}else{
    echo "error al regisrar usuario";
}


mysqli_close($conexion);



?>