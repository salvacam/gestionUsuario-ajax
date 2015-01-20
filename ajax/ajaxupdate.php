<?php

require '../require/comun.php';
header('Content-Type: application/json');
//if ($sesion->isAdministrador()) {
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);

$loginpk = Leer::post("loginpk");
$pagina = 0;
if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}

$login = Leer::post("login");
$clave = Leer::post("clave");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$email = Leer::post("email");
$isactivo = Leer::post("isactivo");
$rol = Leer::post("rol");
$isroot = Leer::post("isroot");

$usuario = new Usuario($login, $clave, $nombre, $apellidos, $email, null, $isactivo, $isroot, $rol, null);
$r = $modelo->edit($usuario, $loginpk);


if ($r === -1) {
    echo '{"r": 0}';
    $bd->closeConexion();
    exit();
}

$enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count(), Configuracion::RPP);
echo '{"r": 1,"paginas":' . json_encode($enlaces) . ',"usuarios":' . $modelo->getListJSON($pagina, Configuracion::RPP) . '}';
$bd->closeConexion();
//}