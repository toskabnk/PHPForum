<?php
//La carpeta donde buscaremos los controladores
//define se usa para definir una constante en tiempo de ejecucion
//const se usa para definirla en tiempo que se declara
//preferible usar define
const CONTROLLERS_FOLDER = 'controller/';

// si no se indica un controlador, este es el controlador que usará
const DEFAULT_CONTROLLER = 'tema';

// si no se indica una accion, esta accion sera la que usara
const DEFAULT_ACTION = 'listaTodosTemas';

//Obtenemos el controlador
//si el usuario no lo introduce, seleccionamos el de por defecto
$controller = DEFAULT_CONTROLLER;
$controllerClass = DEFAULT_CONTROLLER.'controller';
if (!empty ($_GET['controller']))
    $controller = $_GET['controller'];

//Ya tenemos el controlador y la accion
//Formamos el nombre del fichero que contiene nuestro controlador
$controller = CONTROLLERS_FOLDER . $controller . 'controller.php';

//si la variable ($controller) es un ficehro lo requerimos
if (is_file($controller))
    require_once($controller);
else
    die ('El controlador no exste - 404 not found');


//Obtenemos la accion introducida
//Accion por defecto si no es introducida por el usuario
$action = DEFAULT_ACTION;
$controllerObject = new $controllerClass();
$methodVariable = array($controllerObject, $action);

if (!empty ($_GET['action'])) {
    $action =  $_GET['action'];

}

//Si la variable $action es una funcion la ejecutamos o detenemos el script
if (is_callable($methodVariable))
    $methodVariable();
else
    die ('La accion no existe - 404 not found');