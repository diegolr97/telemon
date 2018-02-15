<?php
include("conexion.php");
$codigo=$_GET['codigo'];

$consulta="SELECT * FROM lineapersona where idPersona='$codigo'";
$resultado= mysqli_query($conexion, $consulta);

//conectar a la base de datos


$filas=mysqli_num_rows($resultado);

if($filas>0){
    echo '<script language="javascript"> alert("La persona esta asociada a una linea, no se puede eliminar"); window.location="home.html"; </script>';
    
    
}else{
    $consulta2="DELETE FROM persona WHERE idPersona='$codigo'";
    $resultado2= mysqli_query($conexion, $consulta2);
    if($resultado2){
        echo '<script language="javascript"> alert("La persona se ha eliminado correctamente"); window.location="home.html"; </script>';
        
    }
    
}

mysqli_close($conexion);



?>