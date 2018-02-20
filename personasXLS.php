<?php

//export.php  
include("conexion.php");
$output = '';
if(isset($_POST["personaCalc"]))
{
 $query = "SELECT * FROM persona";
 $resultado = mysqli_query($conexion, $query);
 if(mysqli_num_rows($resultado)>0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th>  
                         <th>Nombre</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($resultado))
  {
   $output .= '
    <tr>  
                         <td>'.$row["idPersona"].'</td>  
                         <td>'.$row["nombre"].'</td>
                           
                           
                         
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=personas.xls');
  echo $output;
 }
}



?>