<?php
require '../require/comun.php';
header('Content-Type: application/json');
//if ($sesion->isAdministrador()) {
    $bd = new BaseDatos();
    $modelo = new ModeloUsuario($bd);
    $pagina = 0;
    if (Leer::get("pagina") != null) {
        $pagina = Leer::get("pagina");
    }
    //sleep(5);
    $enlaces = Paginacion::getEnlacesPaginacionJSON($pagina, $modelo->count(), Configuracion::RPP);
    echo '{"paginas":'.json_encode($enlaces).',"usuarios":'.$modelo->getListJSON($pagina, Configuracion::RPP).'}';
    //echo '{"usuarios":'.$modelo->getListJSON($pagina, Configuracion::RPP) . "}"; //sin paginacion
    $bd->closeConexion();
//}