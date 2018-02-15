<?php
include("conexion.php");
$telefonoL=$_POST['telefonoL'];
$telefonoC=$_POST['telefonoC'];
$tarifa=$_POST['tarifa'];

if(empty($telefonoL) || empty($telefonoC) || empty($tarifa)){
        echo '<script language="javascript"> alert("Rellene todos los campos"); window.location="home.html"; </script>';
}else{
    if(!is_numeric($telefonoL) || !is_numeric($telefonoC)|| !is_numeric($tarifa) ){
        echo '<script language="javascript"> alert("Ninguno de los campos puede contener caracteres"); window.location="home.html"; </script>';
        
    }else{
       $consulta="INSERT INTO linea (telefonoL, telefonoC, enUso, disponible, fechaInicioLinea, tarifa) VALUES ('$telefonoL', '$telefonoC', 'No','Si','".date('Y-m-d H:i:s')."', $tarifa)";
        $resultado= mysqli_query($conexion, $consulta);
        if($resultado){
            echo '<script language="javascript"> alert("Se ha añadido un telefono nuevo"); window.location="home.html"; </script>'; 
        }
        
    }
        
    }


//conectar a la base de datos



mysqli_close($conexion);



?>
