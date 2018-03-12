<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/procesoLineaPersona.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/select2-bootstrap.min.css">

</head>

<body>
    <div class="container">
    <?php
                                $codigo=$_GET['codigo'];
                                include("conexion.php");
                                $consulta="SELECT * FROM persona WHERE idPersona='$codigo'";
                                $resultado=$conexion->query($consulta);
                                $row=$resultado->fetch_assoc();
                                
                 ?>


        <h1 class="tittle"> Asignar Linea | <label><?php echo "(".$row['nombre'].")";?></label></h1>
        
        <hr>
        <div class="row">
            
                <div class="login-form col-md-4 offset-md-4 pedro">
                    <form action="insertarLineaPersona.php?codigo2=<?php echo $row['idPersona']; ?>" method="POST">

                        <div class="form-group">
                            <label for="nombrePersonaModificar">Nombre</label>
                            <input type="text" name="nombrePersonaModificar" class="form-control" placeholder="Escriba el nuevo nombre..." value="<?php echo $row['nombre']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="comboLinea">Lineas</label>
                            <select class="form-control" id="comboLinea" name="comboLinea">
                                    <?php
                                include("conexion.php");
                                $consulta="SELECT * FROM linea WHERE enUso='No' and disponible='Si' ";
                                $resultado=$conexion->query($consulta);
                                while($row=$resultado->fetch_array())
                                {
                                    echo "<option>";
                                    echo $row['telefonoC'];
                                    echo "</option>";
                                }
                                
                                
                                    ?>
                            </select>
                            <?php
                                $codigo=$_GET['codigo'];
                                include("conexion.php");
                                $consulta="SELECT * FROM linea a, lineapersona b, persona c WHERE a.idLinea=b.idLinea and b.idPersona=c.idPersona and c.idPersona='$codigo'";
                                $resultado=$conexion->query($consulta);
                                $row2=$resultado->fetch_assoc();
                                
                            ?>
                            <div class="form-group">
                                <label for="fAltaInsertarLineaPersona">Fecha Alta</label>
                                <input type="text" class="form-control" name="fAltaInsertarLineaPersona" id="fAltaInsertarLineaPersona" value="<?php echo date("Y-m-d");?>">
                                
                            </div>
                            


                            <div class="form-group">
                                <label for="observacionInsertarLineaPersona">Observaciones</label>
                                <textarea class="form-control" name="observacionInsertarLineaPersona" id="observacionInsertarLineaPersona" rows="5"></textarea>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-lg-9"><button type="submit" class="btn btn-primary btn-block">Asignar</button></div>
                            <div class="col"><a class="btn btn-danger" href="home.html">Atrás</a></div>
                        </div>


                        <br>
                    </form>
                </div>

        </div>

    </div>










    <!--   JQuery, Poppers, JavaScriptBootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/select2.min.js"></script>
    <script>
        $('select').select2({
            theme: 'bootstrap'
        });
    </script>
</body>

</html>
