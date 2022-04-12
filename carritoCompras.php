<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Iniciar Sesion</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
    <link href="./estilos/estilosLogin.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .ocultar {
            display: none;
        }

        .mostrar {

            opacity: 1;
            display: block;
            width: 100%;
            text-align: center;
            position: absolute;
            z-index: 1;
        }
    </style>

    <script>
        function comprobarClave() {
            let comprobado = true;
            clave1 = document.formularioRegist.pass.value;
            clave2 = document.formularioRegist.passRep.value;

            if (clave1 != clave2) {

                document.getElementById("error").classList.add("mostrar");
                var mensaje = document.getElementById("error");
                if (mensaje.style.opacity == 0) {
                    mensaje.style.opacity = 1;
                }

                setTimeout(function() {

                    var intervalID = setInterval(function() {
                        if (mensaje.style.opacity > 0) {
                            mensaje.style.opacity -= 0.1;
                        } else {
                            clearInterval(intervalID);
                            document.getElementById("error").classList.remove("mostrar");

                        }

                    }, 100);

                }, 1000);

                comprobado = false;

            }

            return comprobado;
        }

     
    </script>

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0198f1 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                <img src="imagenes/Decathlon_Logo.png" alt="" width="150" height="50">
            </a>
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    CATEGORIAS
                </button>
                <ul class="dropdown-menu">

                    <li><a href="materiales.jsp" class="list-group-item list-group-item-action">Materiales
                            deportivos</a></li>
                    <li><a href="entrenamiento.jsp" class="list-group-item list-group-item-action">Entrenamiento
                            Funcional</a></li>
                    <li><a href="protecciones.jsp" class="list-group-item list-group-item-action">Protecciones
                            deportivas</a></li>
                    <li><a href="singular.jsp" class="list-group-item list-group-item-action ">Singular Wod</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <form class="d-flex" action="carritoCompras.jsp">
                        <button class="btn btn-outline-dark" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                            <span class="badge bg-dark text-white ms-1 rounded-pill">
                                <?php

                                if (isset($_SESSION["carrito"])) {
                                    echo count($_SESSION["carrito"]);
                                } else {
                                    echo "0";
                                }
                                ?>
                            </span>
                        </button>
                    </form>
                    <li class="nav-item">
                        <?php

                        if (isset($_SESSION['sesion'])) {
                        ?>
                            <a class="nav-link fw-bold" href="cerrarSesion.php">Cerrar Sesion</a>

                        <?php

                        } else {
                        ?>
                            <a class="nav-link fw-bold" href="iniciarSesion.php">Iniciar Sesion</a>
                        <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="text-center mt-5">
            <?php
            if (!isset($_SESSION["carrito"]) || count($_SESSION["carrito"]) == 0) {

                if ($_SESSION["tramitado"] == 1) {

                    $_SESSION["tramitado"] = 0

                ?>
                    <div class="modal1" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header" style="text-align: center;">
                                    <h4 class="modal-title">PEDIDO REALIZADO</h4>
                                </div>


                                <div class="modal-body" style="text-align: center;">
                                    EL PEDIDO SE HA REALIZADO CORRECTAMENTE, MUCHAS GRACIAS
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" onclick="document.getElementById('myModal').style.display='none'">CERRAR</button>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
                <h4>Añade articulos a tu carrito en nuestra tienda online</h4>
            <?php } else { ?>
                <?php
                if (count($_SESSION["carrito"]) == 1) {
                ?>
                    <h4 class="mb-sm-4 mb-3">Tu carrito de la compra contiene <?php echo count($_SESSION["carrito"]) ?> producto
                    </h4>
                <?php
                } else {
                ?>
                    <h4 class="mb-sm-4 mb-3">Tu carrito de la compra contiene <?php echo count($_SESSION["carrito"]) ?> productos
                    </h4>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Producto</th>
                                <th>Precio</th>

                                <th>Cambiar Cantidad</th>
                                <th>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $costeTotalPedido = 0;

                            foreach ($_SESSION["carrito"] as $indice => $arreglo) {

                                $precioTotalProducto = $_SESSION["carrito"][$indice]["precioProducto"] * $_SESSION["carrito"][$indice]["cantidadProducto"];
                                $costeTotalPedido += (int) $precioTotalProducto;
                            ?>
                                <tr>
                                    <td><img src="./imagenes/<?php echo $_SESSION["carrito"][$indice]["fotoProducto"] ?>" width="65px" height="65px" /></td>
                                    <td><?php echo $_SESSION["carrito"][$indice]["nombreProducto"]  ?></td>
                                    <td><?php echo $_SESSION["carrito"][$indice]["precioProducto"] ?> €</td>

                                    <form name="formCantidad" action="cambiarCantidades.php" method="POST">
                                        <input type="hidden" name="idProducto" value="<?php echo $indice ?>" />
                                        <td><input type="number" min="1" name="cantidadNueva" size="3" value="<?php echo $_SESSION["carrito"][$indice]["cantidadProducto"] ?>" />
                                            <button class="btn btn-outline-primary" style="margin-left: 5px" type="submit">Modificar Cantidad
                                                <?php echo $_SESSION["carrito"][$indice]["nombreProducto"]  ?></button>
                                        </td>
                                    </form>
                                    <td><?php echo $precioTotalProducto ?> €</td>
                                    <td><a class="btn btn-danger" href="eliminarProducto.php?idProducto=<?php echo $indice ?>">Eliminar</a></td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <p>Su pedido tiene un conste total de <?php echo $costeTotalPedido ?> €</p>

                <?php if (isset($_SESSION["sesion"])) {
                ?>
                    <h2>DATOS DEL ENVIO DEL PEDIDO</h2>
                    <p>Nombre: <?php echo $_SESSION["sesion"]["usuario_nombre"] ?></p>
                    <p>Apellidos: <?php echo $_SESSION["sesion"]["usuario_apellidos"] ?></p>
                    <p>Telefono: <?php echo $_SESSION["sesion"]["usuario_telefono"] ?></p>
                    <p>Direccion: <?php echo $_SESSION["sesion"]["usuario_direccion"] ?></p>
                    <a class="btn btn-success" href="tramitarPedido.php?costeTotalPedido=<?php echo $costeTotalPedido ?>">Tramitar
                        Pedido</a>
                <?php } else { ?>

                    <p>Tiene que iniciar sesion como usuario de alta para poder hacer un pedido correctamente.</p>

                <?php } ?>
        </div>
    <?php } ?>
    

</body>

</html>