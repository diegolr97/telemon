  <?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$nombre=$_POST['nombrePersonaModificar'];

//conectar a la base de datos
$consulta="UPDATE persona SET nombre='$nombre' WHERE idPersona='$codigo'";
$resultado= mysqli_query($conexion, $consulta);

if($resultado){
    echo '<script language="javascript"> alert("Se ha modificado la persona correctamente"); window.location="home.html"; </script>';
}else{
    echo "error al modificar la persona";
}

mysqli_close($conexion);



?>