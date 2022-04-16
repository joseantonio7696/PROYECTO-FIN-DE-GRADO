<?php 

session_start();


include "./db_decatlon.php";

$usuarioId=$_SESSION["sesion"]["usuario_id"];

$costeTotalPedido=$_REQUEST["costeTotalPedido"];

mysqli_query($conexion, "INSERT INTO pedido(usuario_id, pedido_total) VALUES 
                       ('$usuarioId','$costeTotalPedido')")
    or die("Problemas en el select " . mysqli_error($conexion));



    $consulta = mysqli_query($conexion, "SELECT * FROM pedido WHERE usuario_id='$usuarioId' ORDER BY pedido_id DESC LIMIT 1")
or die("Problemas en el select " . mysqli_error($conexion));

$reg = mysqli_fetch_array($consulta);

$pedido_id=$reg["pedido_id"];


foreach ($_SESSION["carrito"] as $indice => $arreglo) {

    $cantidadProducto=$_SESSION["carrito"][$indice]["cantidadProducto"];

mysqli_query($conexion, "INSERT INTO detallepedido(pedido_id, producto_id, detalle_cantidad) VALUES 
    ('$pedido_id','$indice','$cantidadProducto')")
or die("Problemas en el select " . mysqli_error($conexion));

}

unset($_SESSION["carrito"]);

$_SESSION["tramitado"]=1;

header('Location:' . getenv('HTTP_REFERER'));



?>