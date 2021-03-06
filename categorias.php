<?php

session_start();

$categoria_id=$_REQUEST["categoria_id"];

switch ($categoria_id) {
    case '1':
        $tituloSeccion="Accesorios para el entreno";
        break;

        case '2':
            $tituloSeccion="Materiales deportivos";
            break;

            case '3':
                $tituloSeccion="Entrenamiento funcional";
                break;

                case '4':
                    $tituloSeccion="Protecciones Deportivas";
                    break;

                    case '5':
                        $tituloSeccion="Singular Wod";
                        break;
}

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="./javaScript.js"></script>
    <style>
    #map {


        height: 500px;
    }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
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

    <!-- Header-->
    <header class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white rounded-pill" style="background-color: #0198f1 ">
                <h1 class="display-4 fw-bolder"><?php echo $tituloSeccion ?></h1>
                <p class="lead fw-normal text-white-50 mb-0">Aqui teneis todos los productos disponibles de esta categoria</p>
            </div>
        </div>
    </header>


    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">

            <div class="row gx-4 gx-lg-5 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php

                include "./db_decatlon.php";

                $per_page_record = 4;


                $consulta = mysqli_query($conexion, "SELECT * FROM producto WHERE categoria_id= $categoria_id ") or
                    die("Problemas en el select:" . mysqli_error($conexion));

                    $reg = mysqli_num_rows($consulta);

                    $total_pages = ceil($reg / $per_page_record);
                    
                    if (!isset($_GET['page'])) {
                      $page = 1;
                    } else {
                      $page  = $_GET['page'];
                    }

                    $start_from = ($page - 1) * $per_page_record;


            
                    $consulta = mysqli_query($conexion, "SELECT * FROM producto WHERE categoria_id= $categoria_id LIMIT " . $start_from . "," . "$per_page_record") or
                    die("Problemas en el select:" . mysqli_error($conexion));

                while ($row = mysqli_fetch_assoc($consulta)) {


                ?>

                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="imagenes/<?php echo $row['producto_foto'] ?>"
                            alt="<?php echo $row['producto_nombre'] ?>" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $row['producto_nombre'] ?></h5>
                                <!-- Product price-->
                                <div><?php echo $row['producto_precio'] ?> ???</div>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="descripcionProducto.php?idProducto=<?php echo $row['producto_id'] ?>">Ver
                                    Descripcion</a></div>
                        </div>
                    </div>
                </div>
                <?php

                }

                ?>


            </div>

            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="./categorias.php?categoria_id=<?php echo $categoria_id ?> & page=1" tabindex="-1">Anterior</a>
                    </li>

                    <?php
          for ($page = 1; $page <= $total_pages; $page++) {
            echo "<li class='page-item'><a class='page-link' href='./categorias.php?categoria_id=$categoria_id & page=" . $page . "'>" . $page . "</a></li>";
          }
          ?>
                    <li class="page-item">
                        <a class="page-link" href="./categorias.php?categoria_id=<?php echo $categoria_id ?> & page=<?php echo $total_pages ?>">??ltimo</a>
                    </li>

                </ul>
            </nav>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>