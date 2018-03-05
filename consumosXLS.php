<?php
session_start();

//export.php  
include("conexion.php");
$output = '';
    $fechainicio = $_GET['fechainicio3'];
    $fechafinal = $_GET['fechafinal3'];
    
    $fechainicio2 = explode('-', $fechainicio);
    $fechainicio3 = $fechainicio2[0]."-".$fechainicio2[1]."-".$fechainicio2[2];
    
    $fechafinal2 = explode('-', $fechafinal);
    $fechafinal3 = $fechafinal2[0]."-".$fechafinal2[1]."-".$fechafinal2[2];

 $query = "select * from linea a, lineapersona b, consumo c, persona d where a.idLinea=b.idLinea and b.idLinea =c.idLinea and d.idPersona = b.idPersona and b.idPersona=c.idPersona and c.fecha BETWEEN '$fechainicio3' AND '$fechafinal3' and a.idLinea='".$_SESSION["codigo2"]."'";

 $resultado = mysqli_query($conexion, $query);
 if(mysqli_num_rows($resultado)>0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Nombre</th>  
                         <th>telefonoC</th>
                         <th>Consumo(Euros)</th>  
                         <th>Fecha</th> 
                           
                         
                    </tr>
  ';
  while($row = mysqli_fetch_array($resultado))
  {
   $output .= '
    <tr>  
                         <td>'.$row["nombre"].'</td>  
                         <td>'.$row["telefonoC"].'</td>
                         <td>'.$row["consumo"].'</td>  
                         <td>'.$row["fecha"].'</td>
                           
                           
                         
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=consumoLinea.xls');
  echo $output;
 }




?>
