<?php
include("conexion.php");

$query="SELECT * FROM lineapersona";

$tabla="";
$query2="SELECT * FROM linea a, persona b, lineapersona c WHERE b.idPersona=c.idPersona and c.idLinea=a.idLinea and c.activo='Si'";



$buscarLineaPersona=$conexion->query($query);
$buscarLineaPersona2=$conexion->query($query2);
if($buscarLineaPersona->num_rows > 0)
{
    
    $tabla.=
        '<table class="table table-bordered table-striped">
         <caption>Lista de las Lineas de Personas*</caption>
             <thead class="hola">
                <tr>
                  <th scope="col">PERSONA</th>
                  <th scope="col">TELEFONO CORTO</th>
                  <th scope="col">TARIFA</th>
                  <th scope="col">FECHA DE ALTA</th>
                  <th scope="col">OPERACIONES</th>
                  
                 </tr>
               </thead>
               <tbody>';
    while($filaLineaPersona= $buscarLineaPersona2->fetch_assoc())
    {
        $tabla.=
            '<tr>
                <td>'.$filaLineaPersona['nombre'].'</td>
                <td>'.$filaLineaPersona['telefonoC'].'</td>
                <td>'.$filaLineaPersona['tarifa'].'GB</td>
                <td>'.$filaLineaPersona['fAlta'].'</td>
                <td><a href="procesoBajaLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-warning">Baja</button> </a><a href="procesoLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-success">Consumo</button> </a><a href="HistoricoLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-success">Historico</button> </a><a href="notasLineaPersona.php?codigo='.$filaLineaPersona['idLinea'].'"><button type="button" class="btn btn-success">Notas</button> </a></td>
                </tr>';
    }
        $tabla.='</tbody></table>';
        
}else
{
    $tabla="No se encontraron coincidencias con sus criterios de bísqueda.";
}

echo $tabla;

?>