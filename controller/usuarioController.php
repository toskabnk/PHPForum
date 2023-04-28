<?php
require_once '../model/usuario.php';

class usuarioController{

    private Sesion $sesion;

    public function __construsct(){
        $this->sesion = new Sesion();
    }

    /**
     * function
     * registrar_usuario($usuario, $password)
     * Registra un usuario en la BD.
     * Devuelve Boolean o String en caso de error
     *
     * usuarioController.php
     *
     * @param Object $usuario
     * @param String $nombre_usuario
     * @param String $contrasenia
     * @param String $nombre
     * @param String $apellidos
     * @param String $email
     * @return Boolean
     */
    public function registrar_usuario($nombre_usuario, $contrasenia, $nombre, $apellidos, $email){
        return usuario::registraUsuario($nombre_usuario, $contrasenia, $nombre, $apellidos, $email);
    }

    /**
     * function
     * login($usuario, $password)
     * Consigue un usuario de la BD.
     * Devuelve objeto usuario o String en caso de error
     *
     * usuarioController.php
     *
     * @param Object $usuario
     * @param String $nombre_usuario
     * @param String $contrasenia
     * @return Boolean
     */
    public function login($nombre_usuario, $contrasenia){
        return usuario::consigueUsuario($nombre_usuario, $contrasenia);
    }

    public function cerrarSesion(){
        $this->sesion->borrarSesion();
    }
}

$campo = null;
$validacion = true;
$controlador = new usuarioController();
if (isset($_GET["cerrarSesion"])) {
    $controlador->cerrarSesion();
}
require_once("formularioUsuario/loginUsuario.php");
require_once("formularioUsuario/registrarUsuario.php");
