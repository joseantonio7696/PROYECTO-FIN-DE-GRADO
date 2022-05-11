<?php

$id=$_REQUEST["idUsuario"];
$tipoUsuario=$_REQUEST["tipoUsuario"];

include "./db_decatlon.php";

if ($tipoUsuario=="Cliente") {
    mysqli_query($conexion, "UPDATE `usuario` SET Usuario_tipo= 'Administrador' WHERE Usuario_id='$id'" )
    or die("Problemas en el select " . mysqli_error($conexion));
} else {
    mysqli_query($conexion, "UPDATE `usuario` SET Usuario_tipo= 'Cliente' WHERE Usuario_id='$id'" )
    or die("Problemas en el select " . mysqli_error($conexion));
}

    mysqli_close($conexion);
    $url = "./listadoClientes.php";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$url);

?>