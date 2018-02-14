<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/procesoModificarLinea.css">

</head>

<body>
    <div class="container">


        <h1 class="tittle">Modificar Telefono</h1>
        <hr>
        <div class="row">
                <?php
                                $codigo=$_GET['codigo'];
                                include("conexion.php");
                                $resultado=$conexion->query(sprintf("SELECT * FROM linea WHERE idLinea='%s'", mysqli_real_escape_string($conexion, $codigo)));
                                $row=$resultado->fetch_assoc();
            
                                
                 ?>
            <div class="login-form col-md-4 offset-md-4 pedro">
                <form action="modificarLinea.php?codigo2=<?php echo $row['idLinea']; ?>" method="POST">
                    
                        <div class="form-group">
                            <label for="telefonoLLineaModificar">Teléfono Largo</label>
                            <input type="text" name="telefonoLLineaModificar" class="form-control" value="<?php echo $row['telefonoL']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="telefonoCLineaModificar">Teléfono Corto</label>
                            <input type="text" name="telefonoCLineaModificar" class="form-control" value="<?php echo $row['telefonoC']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="TarifaLinea">Tarifa</label>
                            <input type="text" name="TarifaLinea" class="form-control" value="<?php echo $row['tarifa']; ?>">
                        </div>

                        <div class="row">
                            <div class="col-lg-9"><button type="submit" class="btn btn-primary btn-block">Modificar</button></div>
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
</body>

</html>