
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$seleccion=$_POST["seleccion"];

include "./db_decatlon.php";

print_r($seleccion);


foreach ($seleccion as $id) {

    mysqli_query($conexion, "DELETE from `usuario` WHERE usuario_id=$id")
    or die("Problemas en el select " . mysqli_error($conexion));


}

mysqli_close($conexion);
$url = "./listadoClientes.php";
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);


}else {
$url = "./";
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);
}

?>