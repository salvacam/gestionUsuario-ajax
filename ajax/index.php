<?php
require '../require/comun.php';
$ajax = true;
//$sesion->administrador("../");
$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$actual = "usuario";
$dir = "../";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include ("../include/head.php"); ?>
        <title>usuarios ajax</title>
    </head>
    <body>
        <?php include ("../include/barranavegacion.php"); ?>
        <div id="dialogomodalInsertar" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- dialog body -->
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <?php include ("../include/formularioInsertUsuario.php"); ?>
                    </div>
                    <!-- dialog buttons -->
                    <div class="modal-footer">
                        <button type="button" id="btsiI" class="btn btn-success">Aceptar</button>
                        <button type="button" id="btnoI" class="btn btn-warning">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron" style="padding: 10px;">
            <div class="container">
                <h2 style="float: left;">Usuarios</h2>
            </div>
        </div>
        <div class="container">
            <div class="row" >
                <div>
                    <p><a id="btverinsertar" href="#" class="btn btn-primary btn-lg" role="button">Insertar usuario &raquo;</a></p> 
                    <div id="divajax"></div>
                </div>
            </div>
            <?php include ("../include/pie.php"); ?>
        </div>
        <?php include ("../include/fondo.php"); ?>
        <?php include ("../include/script.php"); ?>
        <script src="script/codigo.js"></script>
    </body>
</html>