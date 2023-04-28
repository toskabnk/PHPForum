<?php
require_once 'model/tema.php';

class temaController{
    private Tema $tema;

    public function __construct(){
        $this->tema= new tema(0,"");
    }

    public function listaTodosTemas(){
        $temas = $this->tema->cosigueListaTema();
        include 'view/listaTemas.php';
    }
}