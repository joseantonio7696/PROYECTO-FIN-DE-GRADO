<?php
session_start();

if (!isset($_SESSION["sesion"]) && $_SESSION["sesion"]["usuario_tipo"] != "Administrador") {
    $url = "./";
    header("Location: " . $url);
}




include "./db_decatlon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (!empty($_POST["producto"])) {
        $nombreProducto = $_POST["producto"];
    }
}

if (!isset($nombreProducto)) {
    $url = "./administrador.php";
    header("Location: " . $url);
}


$sql = "SELECT DISTINCT pedido.pedido_id , pedido.pedido_fecha , usuario.usuario_nombre , usuario.usuario_apellidos, producto.producto_nombre, detallepedido.detalle_cantidad, producto.producto_precio, (detallepedido.detalle_cantidad*producto.producto_precio) AS total FROM pedido,producto,usuario,detallepedido WHERE producto.producto_nombre='" . $nombreProducto . "' AND (producto.producto_id=detallepedido.producto_id) AND (detallepedido.pedido_id=pedido.pedido_id) AND (pedido.usuario_id=usuario.usuario_id)";

$consulta = mysqli_query($conexion, $sql) or
    die("Problemas en el select:" . mysqli_error($conexion));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>INICIO-DECATLON</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="estilos/estilosInicio.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0198f1 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./administrador.php">

                <img src="imagenes/Decathlon_Logo.png" alt="" width="150" height="50">

            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link fw-bold" href="cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mt-5 table-responsive">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Identificador Pedido</th>
                        <th scope="col">Fecha del Pedido</th>
                        <th scope="col">Nombre Cliente</th>
                        <th scope="col">Apellidos Cliente</th>
                        <th scope="col">Nombre Producto</th>
                        <th scope="col">Cantidad Producto</th>
                        <th scope="col">Precio Producto</th>
                        <th scope="col">Total €</th>


                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($reg = mysqli_fetch_array($consulta)) {
                        echo "<tr>";
                        echo "<td>" . $reg['pedido_id'] . "</td>";
                        echo "<td>" . $reg['pedido_fecha'] . "</td>";
                        echo "<td>" . $reg['usuario_nombre'] . "</td>";
                        echo "<td>" . $reg['usuario_apellidos'] . "</td>";
                        echo "<td>" . $reg['producto_nombre'] . "</td>";
                        echo "<td>" . $reg['detalle_cantidad'] . "</td>";
                        echo "<td>" . $reg['producto_precio'] . " €</td>";
                        echo "<td>" . $reg['total'] . " €</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>