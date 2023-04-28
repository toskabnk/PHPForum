<?php
require_once '../model/publicacion.php';

class publicacionesController{
    private Publicacion $publicacion;

    public function __construct(){
        $this->publicacion= new publicacion(0,"", "", 0, 0);

    }

    public function listaPublicacionesTema($temaId){
        return $this->publicacion->cosigueListaTema($temaId);
    }

    public function consiguePublicacion($postId){
        return $this->publicacion->cosiguePublicacion($postId);
    }
}

$controller = new publicacionesController();
if(isset($_GET["id"])){
    $publicaciones = $controller->listaPublicacionesTema($_GET["id"]);
} else {
    if(isset($_GET["postId"])){
        $publicacion = $controller->consiguePublicacion($_GET["postId"]);
    }
}


