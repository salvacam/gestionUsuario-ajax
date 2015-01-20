<?php


class SesionEstatica {
    static $sesionIniciada = false;
    
    private static function conectarSesion(){
        if(!self::$sesionIniciada){
            session_start();
        }
    }

    static function cerrar() {
        self::conectarSesion();
        session_unset();
        session_destroy();
    }
    
    static function set($variable, $valor) {
        self::conectarSesion();
        $_SESSION[$variable] = $valor;
    }
    
    static function delete($variable=""){
        self::conectarSesion();
        if($variable!==""){
            unset($_SESSION);
        } else {
            unset($_SESSION[$variable]);
        }
    }

    static function get($variable) {
        self::conectarSesion();
        if (isset($_SESSION[$variable]))
            return $_SESSION[$variable];
        return null;
    }
    
    static function getNombres(){
        self::conectarSesion();
        $array = array();
        foreach ($_SESSION as $key => $value) {
            $array[] = $key;
        }
        return $array;
    }

    static function isSesion(){
        self::conectarSesion();
        return count($_SESSION)>0;
    }

    static function isAutentificado(){
        self::conectarSesion();
        return isset($_SESSION["__usuario"]);
    }

    static function setUsuario($usuario){
        self::conectarSesion();
        if($usuario instanceof Usuario){
            $this->set("__usuario",$usuario);
        }
    }
    
    static function getUsuario(){
        self::conectarSesion();
        if($this->get("__usuario")!=null)
            return $this->get("__usuario");
        return null;
    }
}