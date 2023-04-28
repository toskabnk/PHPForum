<?php
include("header.php");
if (isset($_GET["registro"])){
    require_once 'registro.php';
}else{
?>
<body>
<h2>Iniciar Sesion</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <?php
    if (isset($_GET["errorLogin"])){?>
    <div class="alert alert-primary" role="alert">
        Ha habido un error en el login
    </div>
    <?php
    }
    ?>
    <?php require_once("../controller/usuarioController.php"); ?>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required <?php echo(isset($alias) ? 'value="' . $alias . '"' : '');
    echo(($campo == 'username' || $campo == null) ? 'autofocus' : ''); ?>><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>
    <input type="submit" name="login" value="Iniciar sesión">
</form>

<p>¿Aún no estás registrado? <a class="log-reg" href="<?php echo "?registro" ?>">Registrarse</a></p>
<?php } ?>
</body>
</html>
