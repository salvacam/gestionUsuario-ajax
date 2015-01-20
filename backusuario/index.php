<?php
require '../require/comun.php';
//$sesion->administrador("../");
$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$resultado = Leer::get("insert");
if($resultado!= null){
    if($resultado==1){
        $tipo = 1;
        $mensaje = urlencode("Usuario insertado correctamente");
    } else {
        $tipo = 2;
        $mensaje = urlencode("El Usuario no se ha podido insertar");
    }
}

//$mensaje = urlencode("Ok");
//$tipo = 1;
$objetos = $modelo->getListPagina($pagina, Configuracion::RPP);
$enlaces = Paginacion::getEnlacesPaginacion($pagina, $modelo->count(), Configuracion::RPP);
$actual = "usuario";
$dir = "../";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include ("../include/head.php"); ?>
        <title>usuarios</title>
    </head>
    <body>
        <?php include ("../include/barranavegacion.php"); ?>
        <div class="jumbotron" style="padding: 10px;">
            <div class="container">
                <h2 style="float: left;">Usuarios</h2>
            </div>
        </div>
        <div class="container">
            <div class="row" >
                <div>
                    <p><a href="viewinsert.php" class="btn btn-primary btn-lg" role="button">Insertar usuario &raquo;</a></p>
                    <table border='1'>
                        <thead>
                            <tr>
                                <th>login</th>
                                <th>clave</th>
                                <th>nombre</th>
                                <th>apellidos</th>
                                <th>email</th>
                                <th>rol</th>
                                <th>is root</th>
                                <th>is activo</th>
                                <th>fecha alta</th>
                                <th>fecha login</th>
                                <th colspan="2">operaciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan="12">
                                    <?php echo $enlaces["inicio"]; ?>
                                    <?php echo $enlaces["anterior"]; ?>
                                    <?php echo $enlaces["primero"]; ?>
                                    <?php echo $enlaces["segundo"]; ?>
                                    <?php echo $enlaces["actual"]; ?><!-- normalmente -->
                                    <?php echo $enlaces["cuarto"]; ?>
                                    <?php echo $enlaces["quinto"]; ?>
                                    <?php echo $enlaces["siguiente"]; ?>
                                    <?php echo $enlaces["ultimo"]; ?>
                                </th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            foreach ($objetos as $indice => $objeto) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $objeto->getLogin(); ?>
                                    </td>
                                    <td>
                                        <!--< ?php echo $objeto->getClave(); ?>-->
                                        ********
                                    </td>
                                    <td>
                                        <?php echo $objeto->getNombre(); ?>
                                    </td>
                                    <td>
                                        <?php echo $objeto->getApellidos(); ?>
                                    </td>
                                    <td>
                                        <?php echo $objeto->getEmail(); ?>
                                    </td>
                                    <td>
                                        <?php echo $objeto->getRol(); ?>
                                    </td>
                                    <td>
                                        <?php echo $objeto->getIsroot(); ?>
                                    </td>
                                    <td>
                                        <?php echo $objeto->getIsactivo(); ?>
                                    </td>
                                    <td>
                                        <?php echo $objeto->getFechaalta(); ?>
                                    </td>
                                    <td>
                                        <?php echo $objeto->getFechalogin(); ?>
                                    </td>
                                    <td>
                                        <a data-nombre='<?php echo $objeto->getLogin(); ?>' class="borrar" href="phpdelete.php?login=<?php echo $objeto->getLogin(); ?>">
                                            borrar
                                        </a>
                                    </td>
                                    <td>
                                        <a href="viewedit.php?login=<?php echo $objeto->getLogin(); ?>">
                                            editar
                                        </a>
                                    </td>
                                    <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php include ("../include/pie.php"); ?>
        </div>
        <?php include ("../include/fondo.php"); ?>
        <?php include ("../include/script.php"); ?>
    </body>
</html>