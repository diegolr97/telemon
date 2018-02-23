<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectar a la base de datos

$conexion=mysqli_connect("localhost", "root", "", "lineas");
$consulta="SELECT * FROM loguin WHERE usuario='$usuario' and clave='$clave'";
$resultado= mysqli_query($conexion, $consulta);
$row=$resultado->fetch_assoc();
$filas= mysqli_num_rows($resultado);

if($filas>0){
    if($row['admin']==0){
    header("location:homeUsuario.html");
}else{
       
        header("location:home.html");
    }
    
}else{
echo "Se ha equivocado o no existe ese usuario";
            
}




mysqli_free_result($resultado);
mysqli_close($conexion);

?>


