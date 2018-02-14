<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectar a la base de datos

$conexion=mysqli_connect("localhost", "root", "", "lineas");
$consulta="SELECT * FROM loguin WHERE usuario='$usuario' and clave='$clave'";
$resultado= mysqli_query($conexion, $consulta);

$filas= mysqli_num_rows($resultado);

if($filas>0){
    header("location:home.php");
}else{
    echo "casi pero no";
            
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>
