<?php


include("conexion.php");

$tabla="";
$query="SELECT * FROM persona ORDER BY idPersona";

if(isset($_POST['busquedaUsuario']))
{
    $q=$conexion->real_escape_string($_POST['busquedaUsuario']);
    $query="SELECT * FROM persona WHERE
        idPersona LIKE '%".$q."%' OR
        nombre LIKE '%".$q."%'";
}

$buscarPersonas=$conexion->query($query);
if($buscarPersonas->num_rows > 0)
{
    $tabla.=
        '<table class="table table-bordered table-striped">
         <caption>Lista de Personas*</caption>
             <thead class="hola">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">nombre</th>
                 </tr>
               </thead>
               <tbody>';
    while($filaPersonas= $buscarPersonas->fetch_assoc())
    {
        $tabla.=
            '<tr>
                <td>'.$filaPersonas['idPersona'].'</td>
                <td>'.$filaPersonas['nombre'].'</td>
             </tr>';
    }
        $tabla.='</tbody></table>';
        
}else
{
    $tabla="No se encontraron coincidencias con sus criterios de bísqueda.";
}

echo $tabla;

?>
