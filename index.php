<?php
require 'require/comun.php';
$actual = "inicio";
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
                <h1>Título</h1>
                <p>Subtítulo</p>
                <p><a class="btn btn-primary btn-lg" role="button">Más detalles &raquo;</a></p>
            </div>
        </div>
        <div class="container">
            <div class="row" >
                <div class="col-md-4">
                    <h2>Contenido 1</h2>
                    <p>Texto ...</p>
                </div>
                <div class="col-md-4">
                    <h2>Contenido 2</h2>
                    <p>Texto ...</p>
                </div>
                <div class="col-md-4">
                    <h2>Contenido 3</h2>
                    <p>
                        Texto ...
                        <a data-ver="enlace 1" class="borrar" href="http://www.ugr.es">enlace 1</a>
                        <a data-ver="enlace 2" class="borrar" href="http://www.google.es">enlace 2</a>
                    </p>
                </div>
            </div>
            <?php include ("include/pie.php");?>
        </div>
        <?php include ("include/fondo.php");?>
        <?php include ("include/script.php");?>
    </body>
</html>