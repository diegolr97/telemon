<?php

//export.php  
include("conexion.php");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM linea";
 $resultado = mysqli_query($conexion, $query);
 if(mysqli_num_rows($resultado)>0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th>  
                         <th>telefonoC</th>
                         <th>telefonoL</th>  
                         <th>enUso</th> 
                         <th>Tarifa</th>  
                         
                    </tr>
  ';
  while($row = mysqli_fetch_array($resultado))
  {
   $output .= '
    <tr>  
                         <td>'.$row["idLinea"].'</td>  
                         <td>'.$row["telefonoC"].'</td>
                         <td>'.$row["telefonoL"].'</td>  
                         <td>'.$row["enUso"].'</td>
                         <td>'.$row["tarifa"].'</td>  
                           
                         
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}



?>
