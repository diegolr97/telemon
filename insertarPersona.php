<?php
include("conexion.php");
$nombre=$_POST['nombrePersona'];

if(empty($nombre)){
    echo "<p>Agrega nombre</p>";
    
    
}else{
    
    $consulta2="SELECT * FROM persona WHERE nombre='$nombre'";
    $resultado2= mysqli_query($conexion, $consulta2);
    $row2=$resultado2->fetch_assoc();
    $filas= mysqli_num_rows($resultado2);
    
    if($filas){
        echo '<script language="javascript"> alert("Ya hay una persona con ese nombre"); window.location="home.html"; </script>';
    }else{
        $consulta="INSERT INTO persona (nombre) VALUES ('$nombre')";
    $resultado= mysqli_query($conexion, $consulta);
    echo '<script language="javascript"> alert("Se ha añadido una persona correctamente"); window.location="home.html"; </script>';
    }
    
    
}

//conectar a la base de datos



mysqli_close($conexion);



?>