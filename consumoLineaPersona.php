<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/consumoLineaPersona.css">

</head>

<body>
    <div class="container">
        <?php
            session_start();
            $codigo=$_GET['codigo'];
            $_SESSION["codigo2"] = $codigo;
            include("conexion.php");
            $consulta="SELECT * FROM linea a, lineapersona b, persona c where a.idLinea=b.idLinea and b.idPersona=c.idPersona and a.idLinea='" .$_SESSION["codigo2"]."' and b.activo='Si'";
            $resultado=$conexion->query($consulta);
            $row2=$resultado->fetch_assoc();
                ?>







            <h1 class="tittle"> Consumo | <label><?php echo $row2['nombre']; echo "(".$row2['telefonoC'].")";?></label></h1>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="tittle">Datos</h3>
                    <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">Añadir Consumo</button> 
                    </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-lg-12">
                    <form class="form-row" method="POST">
                        
                            <div class="col-5">
                               <label for="fechaInicioConsumo">Fecha Inicio</label>
                                <input type="date" class="form-control" name="fechaInicioConsumo" id="fechaInicioConsumo">
                            </div>
                            <div class="col-5">
                               <label for="fechaFinalConsumo">Fecha Final</label>
                                <input type="date" class="form-control" name="fechaFinalConsumo" id="fechaFinalConsumo">
                            </div>
                            <button name="guardar2" id="guardar2" type="button" class="btn btn-primary">Buscar</button>
                            
                            
                        
                    </form>
                      </div>
                      <div class="row">
                          <div id="datosConsumo"></div>
                      </div>
                      
                   </div>
                    

                    
                        

                </div>

                <div class="col-lg-6">
                    <h3 class="tittle">Grafica</h3>
                    <form action="insertarObservacionLinea.php?codigo2=<?php echo $row2['idLinea']; ?>" method="POST">
                        <div class="form-group">

                            <textarea name="areaObservacion" class="form-control" id="exampleFormControlTextarea1" rows="25"><?php echo $row2['observacion'];?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>

                    </form>
                </div>
                
                <!-- empieza tercer modal-->
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulario Consumo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="consumoLineaPersona">Consumo</label>
                                <input type="text" id="consumoLineaPersona" name="consumoLineaPersona" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="fechaConsumoLineaPersona">Fecha</label>
                                <input type="text" id="fechaConsumoLineaPersona" name="fechaConsumoLineaPersona" class="form-control" value="<?php echo date("Y-m-d");?>">
                            </div>
                            <button data-dismiss="modal" name="guardar" id="guardar" type="button" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <!--termina tercer modal-->






            </div>

    </div>










    <!--   JQuery, Poppers, JavaScriptBootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="insertarConsumo.js"></script>
    <script src="mostrarConsumoLineaPersona.js"></script>
</body>

</html>
