<?php

session_start();

if (!isset($_SESSION["sesion"]) && $_SESSION["sesion"]["usuario_tipo"] != "Administrador") {
    $url = "./";
    header("Location: " . $url);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Administrador</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="estilos/estilosInicio.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        function showUser() {


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("listaDesplegable").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getUser.php", true);
            xmlhttp.send();

        }

        function autocompletar(valor) {

            if (valor.length == 0) {
                document.getElementById("opcion").innerHTML = "";
                document.getElementById("opcion").style.border = "0px";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("opcion").innerHTML = this.responseText;

                }
            };
            xmlhttp.open("GET", "autocompletar.php?valor=" + valor, true);
            xmlhttp.send();

        }

        

        function ponerValor(valor){
            document.getElementById("cajaAutocompletar").value=valor.innerHTML;
            document.getElementById("opcion").innerHTML="";
        }
    </script>

    <style>
        #opcion {
            text-align: left;
        }

        #opcion p {
            border-bottom: 1px solid black;
            border-left: 1px solid black;
            border-right: 1px solid black;
            display: block;
            width: 100%;
            margin-bottom: 0px;
 
        }

        #opcion p:hover{
            cursor: pointer;
        }
    </style>

</head>

<body onload="showUser()">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0198f1 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">

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
        <div class="text-center mt-5">

            <h2>Bienvenido Señor <?php echo $_SESSION["sesion"]["usuario_nombre"] ?>, aqui podra ver los tipos de listados que le ofrecemos.</h2>

            <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
                <!-- <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Listado de Pedidos entre dos fechas
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action="listadoPedidos.php" method="POST">
                                <div class="mb-3">
                                    <label for="fechaInicial" class="form-label">Fecha Inicial</label>
                                    <input type="date" class="form-control" name="fechaInicial">
                                </div>
                                <div class="mb-3">
                                    <label for="fechaFinal" class="form-label">Fecha Final</label>
                                    <input type="date" class="form-control" name="fechaFinal">
                                </div>
                                <input type="text" name="opcion" value="fechas" hidden />
                                <button type="submit" class="btn btn-primary">Mostrar Listado</button>
                            </form>
                        </div>
                    </div>
                </div> -->

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" onclick="showUser()" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Listado de Clientes
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action="listadoClientes.php" method="POST">
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Seleccione el Cliente:</label>
                                    <select class="form-select" id="listaDesplegable" name="idCliente" aria-label="Default select example">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Tipo de Cliente:</label>
                                    <input type="text" class="form-control"  name="tipoCliente" aria-label="Default select example">
                                    </input>
                                </div>
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Email Cliente</label>
                                    <input type="text" class="form-control"  name="emailCliente" aria-label="Default select example">
                                    </input>
                                </div>
                                <!-- <input type="text" name="opcion" value="cliente" hidden /> -->
                                <button type="submit" class="btn btn-primary">Mostrar Listado</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Listado de Pedidos de un Producto
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <form action="listadoPedidos.php" method="POST">
                                <div class="mb-3">
                                    <label for="cliente" class="form-label">Producto a Buscar:</label>
                                    <input type="text" id="cajaAutocompletar" onkeyup="autocompletar(this.value)" class="form-control" name="producto" placeholder="Escriba aqui su producto"></input>
                                    <div id="opcion"></div>
                                </div>
                                <input type="text" name="opcion" value="producto" hidden />
                                <button type="submit" class="btn btn-primary">Mostrar Listado</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>