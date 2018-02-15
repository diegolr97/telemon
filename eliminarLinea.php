<?php
include("conexion.php");
$codigo=$_GET['codigo'];

$consulta="SELECT * FROM lineapersona WHERE idLinea='$codigo'";
$resultado= mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);


//conectar a la base de datos


if($filas>0){
    echo '<script language="javascript"> alert("El telefono esta asociado a una linea, no se puede eliminar"); window.location="home.html"; </script>';
}else{
$consulta2="DELETE FROM linea WHERE idLinea='$codigo'";
$resultado2= mysqli_query($conexion, $consulta2);

$consulta3="UPDATE linea set enUso='No', disponible='No' WHERE idLinea='$codigo'";
$resultado3= mysqli_query($conexion, $consulta3);
    if($resultado3){
        echo '<script language="javascript"> alert("El telefono se ha eliminado correctamente"); window.location="home.html"; </script>';
    }
}

mysqli_close($conexion);



?>
