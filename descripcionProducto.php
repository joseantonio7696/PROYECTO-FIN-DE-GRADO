<?php
session_start();

include "./db_decatlon.php";

$productoId=$_REQUEST["idProducto"];


$consulta = mysqli_query($conexion, "SELECT * FROM producto WHERE producto_id =".$productoId) or
                    die("Problemas en el select:" . mysqli_error($conexion));

$row=mysqli_fetch_assoc($consulta);
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $row["producto_nombre"] ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #0198f1 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">

                <img src="imagenes/Decathlon_Logo.png" alt="" width="150" height="50">

            </a>

            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    CATEGORIAS
                </button>
                <ul class="dropdown-menu">
                    <li><a href="categorias.php?categoria_id=1" class="list-group-item list-group-item-action">Accesorios para el
                            entreno</a></li>
                    <li><a href="categorias.php?categoria_id=2" class="list-group-item list-group-item-action">Materiales
                            deportivos</a></li>
                    <li><a href="categorias.php?categoria_id=3" class="list-group-item list-group-item-action">Entrenamiento
                            Funcional</a></li>
                    <li><a href="categorias.php?categoria_id=4" class="list-group-item list-group-item-action">Protecciones
                            deportivas</a></li>
                    <li><a href="categorias.php?categoria_id=5" class="list-group-item list-group-item-action ">Singular Wod</a></li>
                </ul>
            </div>
            
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <form class="d-flex" action="carritoCompras.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-cart2" viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
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

    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                        src="imagenes/<?php echo $row["producto_foto"] ?>" alt="..." /></div>
                <div class="col-md-6">

                    <h1 class="display-5 fw-bolder"><?php echo $row["producto_nombre"] ?></h1>
                    <div class="fs-5 mb-3">
                        <div><?php echo $row["producto_precio"] ?> €</div>
                    </div>
                    <p class="lead"><?php echo $row["producto_detalle"] ?></p>
                    <div class="d-flex">
                        <form action="agregarProducto.php" method="POST">
                            <input class="form-control text-center me-3" id="inputQuantity" type="number"
                                name="cantidad" min="1" value="1" style="max-width: 5rem" />
                            <input type="text" hidden value="<?php echo $productoId ?>" name="idProducto" />
                            <button class="btn btn-outline-dark flex-shrink-0 mt-3" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Añadir al Carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-5 fixed-bottom" style="background-color: #0198f1 ">
        <div class="container">
            <p class="m-0 text-center text-white">JOSE ANTONIO MARQUEZ GONZALEZ</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>