<?php
require '../require/comun.php';
//$sesion->administrador("../");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$login = Leer::get("login");
$objeto = $modelo->get($login);
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
                    <form method="post" action="phpedit.php">
                        <table>
                            <tr>
                                <td>login</td>
                                <td>
                                    <input type="text" name="login" value="<?php echo $objeto->getLogin(); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>clave</td>
                                <td>
                                    <input type="text" name="clave" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>nombre</td>
                                <td>
                                    <input type="text" name="nombre" value="<?php echo $objeto->getNombre(); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>apellidos</td>
                                <td>
                                    <input type="text" name="apellidos" value="<?php echo $objeto->getApellidos(); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td>
                                    <input type="text" name="email" value="<?php echo $objeto->getEmail(); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>rol</td>
                                <td>
                                    <!--<input type="text" name="rol" value="< ?php echo $objeto->getRol(); ?>" />-->
                                    <?php echo Util::getRol($objeto->getRol(), "rol", "rol", false); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>is root</td>
                                <td>
                                    <!--<input type="text" name="isroot" value="< ?php echo $objeto->getIsroot(); ?>" />-->
                                    <?php echo Util::getSiNo($objeto->getIsroot(), "isroot", "isroot", false); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>is activo</td>
                                <td>
                                    <!--<input type="text" name="isactivo" value="< ?php echo $objeto->getIsactivo(); ?>" />-->
                                    <?php echo Util::getSiNo($objeto->getIsactivo(), "isactivo", "isactivo", false); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>fecha alta</td>
                                <td>
                                    <?php echo $objeto->getFechaalta(); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>fecha login</td>
                                <td>
                                    <?php echo $objeto->getFechalogin(); ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="loginpk" value="<?php echo $objeto->getLogin(); ?>" />
                                    <input type="submit" value="edición" class="btn btn-success" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <?php include ("../include/pie.php"); ?>
        </div>
        <?php include ("../include/fondo.php"); ?>
        <?php include ("../include/script.php"); ?>
    </body>
</html>