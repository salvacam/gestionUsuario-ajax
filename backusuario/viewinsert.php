<?php
require '../require/comun.php';
$actual = "usuario";
$dir = "../";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include ("../include/head.php"); ?>
        <title>../dwes</title>
    </head>
    <body>
        <?php include ("../include/barranavegacion.php"); ?>
        <div class="jumbotron" style="padding: 10px;">
            <div class="container">
                <h2 style="float: left;">Usuario</h2>
            </div>
        </div>
        <div class="container">
            <div class="row" >
                <div>
                    <?php
                    include ("../include/formularioInsertUsuario.php");
                    ?>
                </div>
            </div>
            <?php include ("../include/pie.php"); ?>
        </div>
        <?php include ("../include/fondo.php"); ?>
        <?php include ("../include/script.php"); ?>
    </body>
</html>