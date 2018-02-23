<?php
include("conexion.php");
session_start();

$tabla="";

if(isset($_POST['fecha1']) || isset($_POST['fecha2']))
{
    $fechainicio = $_POST['fecha1'];
    $fechainicio2 = explode('-', $fechainicio);
    $fechainicio3 = $fechainicio2[0]."-".$fechainicio2[1]."-".$fechainicio2[2];
    
    
    
    $fechafinal = $_POST['fecha2'];
    $fechafinal2 = explode('-', $fechafinal);
    $fechafinal3 = $fechafinal2[0]."-".$fechafinal2[1]."-".$fechafinal2[2];
    

    
    
   $query="SELECT * FROM consumo a, linea b, lineapersona c, persona d WHERE a.idLinea=b.idLinea and b.idLinea=c.idLinea and c.idPersona=d.idPersona and a.fecha BETWEEN '$fechainicio3' AND '$fechafinal3' and b.idLinea='".$_SESSION["codigo2"]."' GROUP BY b.idLinea ";
}

$buscarLineasPersonas=$conexion->query($query);
if($buscarLineasPersonas->num_rows > 0)
{
    $tabla.=
        '<table class="table table-bordered table-striped">
         <caption>Lista de consumos*</caption>
             <thead class="hola">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO CORTO</th>
                  <th scope="col">CONSUMO</th>
                  <th scope="col">FECHA</th>
                 </tr>
               </thead>
               <tbody>';
    while($filaLineaPersona= $buscarLineasPersonas->fetch_assoc())
    {
        $tabla.=
            '<tr>
                <td>'.$filaLineaPersona['idConsumo'].'</td>
                <td>'.$filaLineaPersona['nombre'].'</td>
                <td>'.$filaLineaPersona['telefonoC'].'</td>
                <td>'.$filaLineaPersona['consumo'].'€</td>
                <td>'.$filaLineaPersona['fecha'].'</td>
                
              </tr>';
    }
        $tabla.='</tbody></table>';
        
}else
{
    $tabla="No se encontraron coincidencias con sus criterios de bísqueda.";
}

echo $tabla;


?>