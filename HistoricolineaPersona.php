<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/historicoLineaPersona.css">

</head>

<body>
    <div class="container">
    <?php
            $codigo=$_GET['codigo'];
            include("conexion.php");
            $consulta="SELECT * FROM linea a, lineapersona b, persona c where a.idLinea=b.idLinea and b.idPersona=c.idPersona and a.idLinea='$codigo' and b.activo='Si'";
            $resultado=$conexion->query($consulta);
            $row2=$resultado->fetch_assoc();
                ?>


        <h1 class="tittle"> Historico | <label><?php echo $row2['nombre']; echo "(".$row2['telefonoC'].")";?></label></h1>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                    <h3 class="tittle">Personas pasadas</h3>
                    
                    <table class="table table-bordered table-striped">
                                    <caption>Personas que tuvieron la linea*</caption>
                                    <thead class="hola">
                                        <tr>
                                            <th>nombre</th>
                                            <th>Fecha Alta</th>
                                            <th>FechaBaja</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $codigo=$_GET['codigo'];
                                include("conexion.php");
                                $consulta="SELECT * from linea a, lineapersona b, persona c where a.idLinea=b.idLinea and b.idPersona=c.idPersona and a.idLinea='$codigo' and b.activo='No'";
                                $resultado=$conexion->query($consulta);
                                while($row=$resultado->fetch_assoc())
                                {
                                    echo "<tr>";
                                    echo "<td>"; echo $row['nombre']; echo "</td>";
                                    echo "<td>"; echo $row['fAlta']; echo "</td>";
                                    echo "<td>"; echo $row['fBaja']; echo "</td>";
                                    echo "</tr>";
                                       
                                }
                                
                                ?>
                                </tbody>
                        </table>

                </div>
                <div class="col-lg-6">
                    <h3 class="tittle">Observaciones de la Linea</h3>
                <form action="insertarObservacionLinea.php?codigo2=<?php echo $row2['idLinea']; ?>" method="POST">
                    <div class="form-group">
                        
                        <textarea name="areaObservacion" class="form-control" id="exampleFormControlTextarea1" rows="25"><?php echo $row2['observacion'];?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
                </div>
                
                    

                


        </div>
        <footer class="page-footer font-small stylish-color-dark pt-4 mt-4">




            <!--Copyright-->
            <div class="footer py-3 text-center">
                <div class="container-fluid">
                    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Telemon</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Diego Lucas Romero</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Reconocimiento-NoComercial-SinObraDerivada 4.0 Internacional License</a>



                </div>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->

    </div>










    <!--   JQuery, Poppers, JavaScriptBootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
