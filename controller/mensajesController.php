<?php
require_once '../model/mensaje.php';
require_once '../controller/usuarioController.php';

class mensajesController{
    private mensaje $mensaje;

    public function __construct(){
        $this->mensaje = new mensaje(0, "", 0, 0 , 0);
    }

    public function consigueMensajesPublicacion($postId){
        return $this->mensaje->consigueMensajesPublicacion($postId);
    }
}

$controller = new mensajesController();
$userController = new usuarioController();
if(isset($_GET["postId"])){
    $mensajes = $controller->consigueMensajesPublicacion($_GET["postId"]);
}
