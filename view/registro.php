
<p>Para registrarte en el foro, introduce los datos:</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <?php require_once("../controller/usuarioController.php"); ?>
    <label for="nombre_usuario">Nombre de usuario:</label>
    <input id="nombre_usuario" type="text" name="nombre_usuario" <?php echo (isset($alias) ? 'value="'.$alias.'"' : ''); echo (($campo == 'usuario' || $campo == null) ? 'autofocus':''); ?>>
    <label for="nombre">Nombre:</label>
    <input id="nombre" type="text" name="nombre" <?php echo (isset($nombre) ? 'value="'.$nombre.'"' : ''); echo ( $campo == 'nombre' ? 'autofocus':''); ?>>
    <label for="apellidos">Apellidos:</label>
    <input id="apellidos" type="text" name="apellidos" <?php echo (isset($apellido) ? 'value="'.$apellido.'"' : ''); echo ( $campo == 'apellido' ? 'autofocus':''); ?>>
    <label for="contrasenia">Contraseña:</label>
    <input id="contrasenia" type="password" name="contrasenia" <?php echo ( $campo == ('password'||'password2') ? 'autofocus':''); ?>>
    <label for="email">Email:</label>
    <input id="email" type="text" name="email" <?php echo (isset($email) ? 'value="'.$email.'"' : ''); echo ( $campo == 'email' ? 'autofocus':''); ?>>
    <input type="submit" name="registrar" value="enviar">
</form>
<p class="p-registrar-login">Tienes una cuenta? <a class="log-reg" href="loginForm.php">Iniciar sesión</a></p>