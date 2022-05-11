<?php

session_start();

if (!isset($_SESSION["sesion"]) && $_SESSION["sesion"]["usuario_tipo"] != "Administrador") {
    $url = "./";
    header("Location: " . $url);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (!empty($_POST["idCliente"])) {
        $idUsuario = $_POST["idCliente"];
    }

    if (!empty($_POST["tipoCliente"])) {
        $tipoCliente = $_POST["tipoCliente"];
    }

    if (!empty($_POST["emailCliente"])) {
        $emailCliente = $_POST["emailCliente"];
    }
}


$sql = 'SELECT * FROM usuario';

$clauses = array();
//These two variables might be created via a form request.


if (isset($idUsuario)) {
    $clauses[] = 'usuario_id = "' . $idUsuario . '"';
}
if (isset($tipoCliente)) {
    $clauses[] = 'usuario_tipo = "' . $tipoCliente . '"';
}
if (isset($emailCliente)) {
    $clauses[] = 'usuario_email LIKE "' . $emailCliente . '%"';
}

if (count($clauses) > 0) {
    $sql .= ' WHERE ' . implode(' AND ', $clauses) . ';';
}


include "./db_decatlon.php";



$consulta = mysqli_query($conexion, $sql) or
    die("Problemas en el select:" . mysqli_error($conexion));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>TABLA DE BUSQUEDA</title>
    <style>
        tr {
            text-align: center;
        }

        td {
            text-align: center;
        }

        #pasador {
            width: 100%;
            text-align: center;
            margin: 0 auto;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0198f1 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./administrador.php">

                <img src="imagenes/Decathlon_Logo.png" alt="" width="150" height="50">

            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item"><a class="nav-link fw-bold" href="cerrarSesion">Cerrar Sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mt-5">

            <form action="./borradoUsuarios.php" method="POST">

                <table class="table table-hover table-responsive">
                    <thead class="thead-dark">
                        <tr>
                            <th>Marcar</th>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Tipo de Usuario</th>
                            <th>Correo electronico</th>
                            <th>Numero Telefono</th>
                            <th>Direccion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($reg = mysqli_fetch_array($consulta)) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' name='seleccion[]' value='" . $reg['usuario_id'] . "'></input></td>";
                            echo "<td>" . $reg['usuario_id'] . "</td>";
                            echo "<td>" . $reg['usuario_nombre'] . "</td>";
                            echo "<td>" . $reg['usuario_apellidos'] . "</td>";
                            echo "<td>" . $reg['usuario_tipo'] . "</td>";
                            echo "<td>" . $reg['usuario_email'] . "</td>";
                            echo "<td>" . $reg['usuario_telefono'] . "</td>";
                            echo "<td>" . $reg['usuario_direccion'] . "</td>";
                            echo "<td><a class='btn btn-info' href='modificarTipoUsuario.php?idUsuario=".$reg['usuario_id']."&tipoUsuario=".$reg['usuario_tipo']."'>Cambiar Tipo</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-danger" value="Eliminar Usuarios Seleccionados"/>
            </form>
        </div>
    </div>

</body>

</html>