<?php

include("conexion.php");

$tabla="";
$query="SELECT * FROM linea a, lineapersona b, persona c WHERE a.idLinea=b.idLinea and b.idPersona=c.idPersona and b.activo='No'";

if(isset($_POST['busqueda4']))
{
    $q=$conexion->real_escape_string($_POST['busqueda4']);
    $query="SELECT * FROM linea a, lineapersona b, persona c WHERE a.idLinea=b.idLinea and b.idPersona=c.idPersona and b.activo='No' and c.nombre LIKE '%".$q."%'";
}

$buscarLineasPersonas=$conexion->query($query);
if($buscarLineasPersonas->num_rows > 0)
{
    $tabla.=
        '<table class="table table-bordered table-striped">
         <caption>Lista de teléfonos*</caption>
             <thead class="hola">
                <tr>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO CORTO</th>
                  <th scope="col">TARIFA</th>
                  <th scope="col">FECHA DE ALTA</th>
                  <th scope="col">FECHA DE BAJA</th>
                  
                 </tr>
               </thead>
               <tbody>';
    while($filaLineaPersona= $buscarLineasPersonas->fetch_assoc())
    {
        $tabla.=
            '<tr>
                <td>'.$filaLineaPersona['nombre'].'</td>
                <td>'.$filaLineaPersona['telefonoC'].'</td>
                <td>'.$filaLineaPersona['tarifa'].'GB</td>
                <td>'.$filaLineaPersona['fAlta'].'</td>
                <td>'.$filaLineaPersona['fBaja'].'</td>
                
                
            </tr>';
    }
        $tabla.='</tbody></table>';
        
}else
{
    $tabla="No se encontraron coincidencias con sus criterios de bísqueda.";
}

echo $tabla;


?>