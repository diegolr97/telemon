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
        
        $consulta2="SELECT * FROM linea WHERE telefonoL='$telefonoL' or telefonoC='$telefonoC'";
        $resultado2= mysqli_query($conexion, $consulta2);
        $row=$resultado2->fetch_assoc();
        $filas= mysqli_num_rows($resultado2);
        
        if($filas>0){
            echo '<script language="javascript"> alert("Este telefono ya existe, comprueba que el telefono largo o corto lo tiene otra persona"); window.location="home.html"; </script>';
        }else{
            $consulta="INSERT INTO linea (telefonoL, telefonoC, enUso, disponible, tarifa) VALUES ('$telefonoL', '$telefonoC', 'No','Si', $tarifa)";
            $resultado= mysqli_query($conexion, $consulta);
            
        if($resultado){
            echo '<script language="javascript"> alert("Se ha añadido un telefono nuevo"); window.location="home.html"; </script>'; 
        }
            
        }
        
    }
        
    }


//conectar a la base de datos



mysqli_close($conexion);



?>
