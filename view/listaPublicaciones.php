<?php
include("header.php");
include_once '../controller/publicacionesController.php'
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <div class="row justify-content-center mb-1">
        <h3>Listado de publicaciones
    </div>

</div>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <?php
    if($publicaciones != null){
    foreach ($publicaciones as $tem): ?>
        <div class="row justify-content-center mb-1">
            <div class="col">
                <?php echo $tem['titulo'] ?></td>
            </div>
            <div class="col">
                <a href="verPublicacion.php?postId=<?php echo $tem['postId'] ?>" class="btn btn-info" type="button">Ver publicacion</a>
            </div>
        </div>
    <?php endforeach;}else{
    ?>
        <div class="row justify-content-center mb-1">
            <div class="col">
                No hay temas aqui</td>
            </div>
        </div>
        <?php
    } ?>
</div>
</body>
</html>