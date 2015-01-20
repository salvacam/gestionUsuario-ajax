<?php

require '../require/comun.php';
header('Content-Type: application/json');
//if ($sesion->isAdministrador()) {
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$login = Leer::get("login");
$aux = $modelo->get($login);
$r = null;
if ($aux !== null) {
    $r = $modelo->getJSON($login);
}
$bd->closeConexion();
if ($r === null) {
    echo '{"r": 0}';
    exit();
} else {
    echo '{"r": 1,' . '"persona": ' . $r.'}';
}
//}