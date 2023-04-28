<?php
include("header.php");
?>
<div class="container-sm text-center justify-content-center w-25 mt-5">
    <?php foreach ($temas as $tem): ?>
        <div class="row justify-content-center mb-1">
            <div class="col">
                <?php echo $tem['nombre'] ?></td>
            </div>
            <div class="col">
                <a href="view/listaPublicaciones.php?id=<?php echo $tem['temaId'] ?>" class="btn btn-info" type="button">Ver hilos</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>