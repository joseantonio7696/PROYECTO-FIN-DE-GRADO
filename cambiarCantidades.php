<?php

session_start();

$productoId=$_POST["idProducto"];

$cantidadActualizada=$_REQUEST["cantidadNueva"];

$_SESSION["carrito"][$productoId]["cantidadProducto"]=$cantidadActualizada;

header('Location:' . getenv('HTTP_REFERER'));

?>