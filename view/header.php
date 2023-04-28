<!DOCTYPE html>
<html lang="es">
<?php
session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>PHP-MVC_Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <div class="container justify-content-center">
        <a href="/PHP-MVC-Forum/index.php" class="btn btn-info m-1" type="button">Temas</a>
        <?php
        if(isset($_SESSION['usuario'])){
            ?>
            <a href="" class="btn btn-info m-1" type="button"><?php echo$_SESSION['usuario']?></a>
            <form method="post">
                <input type="submit" class="btn btn-info m-1" name="destroy" value="Logout">
            </form>
            <?php
        } else {
        ?>
            <a href="/PHP-MVC-Forum/view/loginForm.php" class="btn btn-info m-1" type="button">Iniciar Sesion</a>
            <a href="/PHP-MVC-Forum/view/loginForm.php?registro" class="btn btn-info m-1" type="button">Registrarse</a>
        <?php
        }
        if (isset($_POST["destroy"])) {
            session_start(); // Inicia la sesión
            unset($_SESSION["usuario"]); // Destruye la variable de sesión "variable"
            header("Refresh:0");
        }
        ?>

    </div>
</nav>