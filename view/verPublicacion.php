<?php
include("header.php");
include_once '../controller/publicacionesController.php';
include_once '../controller/mensajesController.php';
if ($publicacion != null){
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <div class="col">
            Titulo publicacion:<?php echo $publicacion->getTitulo(); ?></td>
        </div>
        <div class="col">
            Mensaje:<?php echo $publicacion->getMensaje(); ?></td>
        </div>
    </div>
</div>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <?php
    if ($mensajes != null) {
        foreach ($mensajes as $tem): ?>
            <div class="row justify-content-center mb-1">
                <div class="col">
                    Usuario:<?php echo $userController->consigueNombre($tem['userId'])["nombre_usuario"] ?></td>
                </div>
                <div class="col">
                    Mensaje:<?php echo $tem['mensaje'] ?></td>
                </div>
            </div>
        <?php endforeach;
    } else {
        ?>
        <div class="row justify-content-center mb-1">
            Aun no hay respuestas
        </div>
        <?php
    }
    } else {
        ?>
        <div class="container-sm text-center justify-content-center w-25 mt-5">
            No existe esa publicacion
        </div>
    <?php } ?>
</div>
</body>
</html>