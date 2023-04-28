<?php
class Sesion {

    function __construct() {
        session_start();
    }

    public static function creaSesion($clave,$valor): void
    {
        $_SESSION[$clave] = $valor;
    }

    public function consigueSesion($clave) {
        return $_SESSION[$clave] ?? false;
    }

    public function borrarSesion(): void
    {
        $_SESSION = array();
        session_destroy();
    }
}