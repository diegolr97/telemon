<?php
include("conexion.php");
$nombre=$_POST['nombrePersona'];

if(empty($nombre)){
    echo "<p>Agrega nombre</p>";
    
    
}else{
    $consulta="INSERT INTO persona (nombre) VALUES ('$nombre')";
    $resultado= mysqli_query($conexion, $consulta);
    echo '<script language="javascript"> alert("Se ha añadido una persona correctamente"); window.location="home.html"; </script>';
}

//conectar a la base de datos



mysqli_close($conexion);



?>