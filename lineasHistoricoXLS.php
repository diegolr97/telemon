<?php

//export.php  
include("conexion.php");
$output = '';
if(isset($_POST["historicoLineasXLS"]))
{
 $query = "SELECT * FROM linea a, lineapersona b, persona c WHERE a.idLinea=b.idLinea and b.idPersona=c.idPersona and b.activo='No'";
 $resultado = mysqli_query($conexion, $query);
 if(mysqli_num_rows($resultado)>0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Nombre</th>  
                         <th>telefonoC</th>
                         <th>Tarifa(GB)</th>  
                         <th>Fecha Alta</th>
                         <th>Fecha Baja</th> 
                           
                         
                    </tr>
  ';
  while($row = mysqli_fetch_array($resultado))
  {
   $output .= '
    <tr>  
                         <td>'.$row["nombre"].'</td>  
                         <td>'.$row["telefonoC"].'</td>
                         <td>'.$row["tarifa"].'</td>  
                         <td>'.$row["fAlta"].'</td>
                         <td>'.$row["fBaja"].'</td>
                           
                           
                         
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=lineasHistorico.xls');
  echo $output;
 }
}



?>