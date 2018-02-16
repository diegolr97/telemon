<?php
include("conexion.php");

$tabla="";
$query="SELECT * FROM linea ORDER BY idLinea ";

if(isset($_POST['busqueda2']))
{
    $q=$conexion->real_escape_string($_POST['busqueda2']);
    $query="SELECT * FROM linea WHERE 
    telefonoL LIKE '%".$q."%' OR 
    telefonoC LIKE '%".$q."%'";
}

$buscarLineas=$conexion->query($query);
if($buscarLineas->num_rows > 0)
{
    $tabla.=
        '<table class="table table-bordered table-striped">
         <caption>Lista de teléfonos*</caption>
             <thead class="hola">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">TELEFONO LARGO</th>
                  <th scope="col">TELEFONO CORTO</th>
                  <th scope="col">EN USO</th>
                  <th scope="col">TARIFA</th>
                  <th scope="col" colspan="2">OPERACIONES</th>
                 </tr>
               </thead>
               <tbody>';
    while($filaLineas= $buscarLineas->fetch_assoc())
    {
        $tabla.=
            '<tr>
                <td>'.$filaLineas['idLinea'].'</td>
                <td>'.$filaLineas['telefonoL'].'</td>
                <td>'.$filaLineas['telefonoC'].'</td>
                <td>'.$filaLineas['enUso'].'</td>
                <td>'.$filaLineas['tarifa'].'GB</td>
                <td><a href="procesoModificarLinea.php?codigo='.$filaLineas['idLinea'].'"><button type="button" class="btn btn-success">Modificar</button> </a> </td>
                <td><a href="eliminarLinea.php?codigo='.$filaLineas['idLinea'].'"><button type="button" class="btn btn-danger">Eliminar</button> </a> </td>
                
                
                
             </tr>';
    }
        $tabla.='</tbody></table>';
        
}else
{
    $tabla="No se encontraron coincidencias con sus criterios de bísqueda.";
}

echo $tabla;

?>