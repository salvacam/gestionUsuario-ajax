<?php
require 'require/comun.php';
$actual = "acerca";
$dir = "./";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include ("include/head.php");?>
        <title>dwes</title>
    </head>
    <body>
        <?php include ("include/barranavegacion.php");?>
        <div class="jumbotron">
            <div class="container">
                <h1>Acerca de</h1>
            </div>
        </div>
        <div class="container">
            <div class="row" >
                Texto ...
            </div>
            <?php include ("include/pie.php");?>
        </div>
        <?php include ("include/fondo.php");?>
        <?php include ("include/script.php");?>
    </body>
</html>