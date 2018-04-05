<?php

include("conexion.php");

$tabla="";
$query="SELECT * FROM linea a, lineapersona b, persona c WHERE a.idLinea=b.idLinea and b.idPersona=c.idPersona and b.activo='Si'";

if(isset($_POST['busqueda3']))
{
    $q=$conexion->real_escape_string($_POST['busqueda3']);
    $query="SELECT * FROM linea a, lineapersona b, persona c WHERE a.idLinea=b.idLinea and b.idPersona=c.idPersona and b.activo='Si' and c.nombre LIKE '%".$q."%'";
}

$buscarLineasPersonas=$conexion->query($query);
if($buscarLineasPersonas->num_rows > 0)
{
    $tabla.=
        '<table class="table table-bordered table-striped">
         <caption>Lista de Lineas*</caption>
             <thead class="hola">
                <tr>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO LARGO</th>
                  <th scope="col">TELEFONO CORTO</th>
                  <th scope="col">TARIFA</th>
                  <th scope="col">FECHA DE ASIGNACION</th>
                  <th scope="col">OPERACIONES</th>
                 </tr>
               </thead>
               <tbody>';
    while($filaLineaPersona= $buscarLineasPersonas->fetch_assoc())
    {
        $tabla.=
            '<tr>
                <td>'.$filaLineaPersona['nombre'].'</td>
                <td>'.$filaLineaPersona['telefonoL'].'</td>
                <td>'.$filaLineaPersona['telefonoC'].'</td>
                <td>'.$filaLineaPersona['tarifa'].'GB</td>
                <td>'.$filaLineaPersona['fAlta'].'</td>
                <td><a href="procesoBajaLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-warning">Baja</button> </a><a href="HistoricoLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-success">Historico</button> </a><a href="notasLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-success">Notas</button> </a><a href="consumoLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-success">Consumo</button> </a></td>
                
            </tr>';
    }
        $tabla.='</tbody></table>';
        
}else
{
    $tabla="No se encontraron coincidencias con sus criterios de bísqueda.";
}

echo $tabla;


?>