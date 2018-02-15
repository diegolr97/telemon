<?php
include("conexion.php");
$codigo=$_GET['codigo2'];
$telefonoL=$_POST['telefonoLLineaModificar'];
$telefonoC=$_POST['telefonoCLineaModificar'];
$tarifa=$_POST['TarifaLinea'];

//conectar a la base de datos

if(empty($telefonoL) || empty($telefonoC) || empty($tarifa)){
        echo '<script language="javascript"> alert("Rellene todos los campos"); window.location="home.html"; </script>';
}else{
    if(!is_numeric($telefonoL) || !is_numeric($telefonoC)|| !is_numeric($tarifa) ){
        echo '<script language="javascript"> alert("Ninguno de los campos puede contener caracteres"); window.location="home.html"; </script>';
        
    }else{
        $consulta="UPDATE linea SET telefonoL='$telefonoL', telefonoC='$telefonoC', tarifa='$tarifa' WHERE idLinea='$codigo'";
        $resultado= mysqli_query($conexion, $consulta);
        if($resultado){
           echo '<script language="javascript"> alert("Se ha modificado un telefono nuevo"); window.location="home.html"; </script>'; 
        }
         
    }
        
    }


mysqli_close($conexion);



?>