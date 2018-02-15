  <?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$nombre=$_POST['nombrePersonaModificar'];

if(empty($nombre)){
    echo '<script language="javascript"> alert("Rellene el campo nombre"); window.location="home.html"; </script>';
}else{
$consulta="UPDATE persona SET nombre='$nombre' WHERE idPersona='$codigo'";
$resultado= mysqli_query($conexion, $consulta);
    echo '<script language="javascript"> alert("Se ha modificado la persona correctamente"); window.location="home.html"; </script>';
}

//conectar a la base de datos



mysqli_close($conexion);



?>