<?php
require '../require/comun.php';
//$sesion->administrador("../");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$login=Leer::get("login");
$r = $modelo->deletePorLogin($login);
$bd->closeConexion();
header("Location: index.php?delete=$r");