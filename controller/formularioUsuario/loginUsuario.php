<?php
if (!empty($_POST["login"])) {
    foreach ($_POST as $key => $value) {
        $value = trim($value);
    }
    $usuario = $controlador->login($_POST["username"], $_POST["password"]);
    if (gettype($usuario) == "string") {
        $_SESSION["formdata"] = $_POST;
        $_SESSION["mensajeregistrar"] = $usuario;
        header("Location:" . $_SERVER['PHP_SELF'] . "?errorLogin");
    } else {
        if ($usuario == null) {
            header("Location:" . $_SERVER['PHP_SELF'] . "?errorLogin");
        } else {
            //require_once("email.php"); // requiere el archivo email.
            //$_SESSION["mensajeregistrar"] = Email::email_registrar($_SESSION["formdata"]); // llama a la función email y y almacena el mensaje que devuelve.
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    }
} else {
    $_SESSION["formdatalogin"] = $_POST; //almacena los datos enviador por formulario
    //$_SESSION["mensajelogin"] = $mensaje; // almacena el mensaje de error
}
