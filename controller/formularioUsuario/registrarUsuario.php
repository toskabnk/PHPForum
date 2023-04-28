<?php

if(isset($_POST["registrar"])){
    foreach($_POST as $key=>$value){
        //elimina los espacios del principio y final.
        $value = trim($value);
        // si el campo está vacío
        if($value == "") {
            $mensaje = '<p class="error-form">El campo <b>' . $key . '</b> no puede estár vacío</p>'; // asigna mensaje de error
            $validacion = false;
            echo $mensaje;
            break;
        }
    }// end foreach

    if($validacion){
        $respuesta = $controlador->registrar_usuario($_POST["nombre_usuario"],$_POST["contrasenia"],$_POST["nombre"],$_POST["apellidos"],$_POST["email"]);

        //Si ya existe el alias o si ocurre un error al ejecutar la consulta vuelve a seccion registrar y muestra el mensaje.
        if(gettype($respuesta) == "string"){
            $_SESSION["formdata"] = $_POST;
            $_SESSION["mensajeregistrar"] = $respuesta;
            echo $respuesta;
            // Si no ocurre ningun error...
        }else{
            $_SESSION["formdata"] = $_POST; // almacena los datos enviados por post.
            //require_once("email.php"); // requiere el archivo email.
            //$_SESSION["mensajeregistrar"] = Email::email_registrar($_SESSION["formdata"]); // llama a la función email y y almacena el mensaje que devuelve.
            header("Location:". $_SERVER['PHP_SELF']."?registrar=si");
        }
        // si validación es false...
    }else{
        $_SESSION["formdata"] = $_POST; // almacena datos enviados por formulario
        //$_SESSION["mensajeregistrar"] = $mensaje; //almacena mensaje de error.
    }// end if validacion. registrar
}// end if(isset($_POST["registrar"]))

?>