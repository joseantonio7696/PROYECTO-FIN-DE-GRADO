<?php

session_start();

$productoId=$_REQUEST["idProducto"];

unset($_SESSION["carrito"][$productoId]);

header('Location:' . getenv('HTTP_REFERER'));

?>