<?php

session_start();

$_SESSION["carrito"];

include "./db_decatlon.php";

$productoId=$_REQUEST["idProducto"];

$consulta = mysqli_query($conexion, "SELECT * FROM producto WHERE producto_id =".$productoId) or
                    die("Problemas en el select:" . mysqli_error($conexion));

$row=mysqli_fetch_assoc($consulta);

$_SESSION["carrito"][$row["producto_id"]]["nombreProducto"]=$row["producto_nombre"];
$_SESSION["carrito"][$row["producto_id"]]["precioProducto"]=(int)$row["producto_precio"];
$_SESSION["carrito"][$row["producto_id"]]["cantidadProducto"]+=(int)$_REQUEST["cantidad"];
$_SESSION["carrito"][$row["producto_id"]]["fotoProducto"]=$row["producto_foto"];

header('Location:' . getenv('HTTP_REFERER'));

?>