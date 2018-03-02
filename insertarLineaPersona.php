<?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$telefonoC=$_POST['comboLinea'];
$observacion=$_POST['observacionInsertarLineaPersona'];
$fecha=$_POST['fAltaInsertarLineaPersona'];

$consulta="SELECT idLinea FROM linea WHERE telefonoC='$telefonoC'";
$resultado=$conexion->query($consulta);
$row=$resultado->fetch_assoc();

$consulta4="SELECT * FROM lineapersona WHERE idLinea='".$row['idLinea']."' and idPersona='$codigo'";
$resultado4= mysqli_query($conexion, $consulta4);
$row2=$resultado4->fetch_assoc();
$filas= mysqli_num_rows($resultado4);

if($filas>0){
$consulta5="UPDATE lineapersona set activo='Si' WHERE idLinea='".$row['idLinea']."' and idPersona='$codigo'";
$resultado5= mysqli_query($conexion, $consulta5);

$consulta6="UPDATE linea set enUso='Si', disponible='No' WHERE telefonoC='$telefonoC'";
$resultado6= mysqli_query($conexion, $consulta6);

if($resultado6){
    echo '<script language="javascript"> alert("Se ha añadido una Linea de Persona"); window.location="home.html"; </script>';
}else{
    printf("Errormessage: %s\n", $conexion->error);
}
    
    
}else{
$consulta2="INSERT INTO lineapersona (idLinea, idPersona, activo, fAlta, observacion) VALUES ('".$row['idLinea']."', '$codigo', 'Si', '$fecha', '$observacion')";
$resultado2= mysqli_query($conexion, $consulta2);

$consulta3="UPDATE linea set enUso='Si', disponible='No' WHERE telefonoC='$telefonoC'";
$resultado3= mysqli_query($conexion, $consulta3);

if($resultado3){
    echo '<script language="javascript"> alert("Se ha añadido una Linea de Persona"); window.location="home.html"; </script>';
}else{
    printf("Errormessage: %s\n", $conexion->error);
}
    
}












?>