<?php
include("header.php");
include_once '../controller/publicacionesController.php'
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <?php foreach ($publicaciones as $tem): ?>
        <div class="row justify-content-center mb-1">
            <div class="col">
                <?php echo $tem['titulo'] ?></td>
            </div>
            <div class="col">
                <a href="view/verPublicacion.php?id=<?php echo $tem['postId'] ?>" class="btn btn-info" type="button">Ver publicacion</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>