<?php
 require_once 'model/conexion/conexion.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>PHPFORUML</title>
</head>

<body>
<header>
    <h1>PHPFORUML</h1>
    <nav>
    </nav>
</header>

</body>
<?php
    $conexion = Conectar::Conexion();
    if(isset($conexion)){
        echo "Vamos bien";
        if(gettype($conexion) == "string"){
            echo $conexion;
        } else{
            echo "Conexion establecida";
        }
        $conexion = null;

    } else {
        echo "Vamos mal";
    }
?>
</html>