<?php
require '../require/comun.php';
//$sesion->administrador("../");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$objeto = new Usuario();
$objeto->setLogin(Leer::post("login"));
$objeto->setClave(Leer::post("clave"));
$objeto->setNombre(Leer::post("nombre"));
$objeto->setApellidos(Leer::post("apellidos"));
$objeto->setEmail(Leer::post("email"));
$objeto->setRol(Leer::post("rol"));
$objeto->setIsroot(Leer::post("isroot"));
$objeto->setIsactivo(Leer::post("isactivo"));
//$objeto->setFechaalta(Leer::post("fechaalta"));
//$objeto->setFechalogin(Leer::post("fechalogin"));
$r = $modelo->add($objeto);
$bd->closeConexion();
header("Location: index.php?insert=$r");