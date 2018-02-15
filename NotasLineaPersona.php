<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/observacionesLineaPersona.css">

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

        <h1 class="tittle">Notas | <label><?php echo $row2['nombre']; echo "(".$row2['telefonoC'].")";?></label></h1>
        
        <hr>
        <h3 class="tittle">Notas/Recordatorio</h3>
                    <form action="insertarObservacionLinea.php?codigo2=<?php echo $row2['idLinea']; ?>" method="POST">

                        <div class="form-group">
                            <label for="textAreaObservacion">Descripcion</label>
                            <textarea class="form-control" name="textAreaObservacion" id="textAreaObservacion" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir</button>

                    </form>
                    <hr>

                    <?php
            $codigo=$_GET['codigo'];
            include("conexion.php");
            $consulta="SELECT * FROM observaciones where idLinea='$codigo' ORDER BY fecha DESC";
            $resultado=$conexion->query($consulta);
            while($row3=$resultado->fetch_assoc()){
                echo "<div id='accordion'>";
                echo "<div class='card'>";
                        echo "<div class='card-header' id='headingTwo'>";
                            echo "<h5 class='mb-0'>";
                                echo "<button class='btn btn-link collapsed' data-toggle='collapse' data-target='"; echo "#"; echo $row3['idObservacion']; echo "'"; echo "aria-expanded='false' aria-controls='collapseTwo'>"; echo $row3['fecha']; echo "</button>";
                            echo "</h5>";
                        echo "</div>";
                        echo "<div id='"; echo $row3['idObservacion']; echo"'"; echo "class='collapse' aria-labelledby='headingTwo' data-parent='#accordion'>";
                            echo "<div class='card-body'>";
                 echo "<textarea class='form-control' id='exampleFormControlTextarea1' rows='3'>";
                     echo $row3['descripcion'];
                     echo "</textarea>";
                                echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "</div>";
                
            
                  
                    
            }
                        
                        ?>

    </div>










    <!--   JQuery, Poppers, JavaScriptBootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
