<?php

require '../require/comun.php';
header('Content-Type: application/json');
//if ($sesion->isAdministrador()) {
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);


$objeto = new Usuario();
$objeto->setLogin(Leer::request("login"));
$objeto->setClave(Leer::request("clave"));
$objeto->setNombre(Leer::request("nombre"));
$objeto->setApellidos(Leer::request("apellidos"));
$objeto->setEmail(Leer::request("email"));
$objeto->setRol(Leer::request("rol"));
$objeto->setIsroot(Leer::request("isroot"));
$objeto->setIsactivo(Leer::request("isactivo"));

$r = $modelo->add($objeto);
if ($r === -1) {
    echo '{"r": 0}';
    $bd->closeConexion();
    exit();
}
//$pagina = 0;
$pagina = ceil($modelo->count() / Configuracion::RPP) - 1;
$enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count(), Configuracion::RPP);
echo '{"r": 1,"paginas":' . json_encode($enlaces) . ',"usuarios":' . $modelo->getListJSON($pagina, Configuracion::RPP) . '}';
$bd->closeConexion();

//}