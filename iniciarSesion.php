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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link href="./estilos/estilosLogin.css" rel="stylesheet" type="text/css">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-cart2" viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                            <span
                                class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $_SESSION["contador"] ?></span>
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
    <div class="col-md-6 mx-auto p-0">
        <div class="login-box">
            <div class="login-snip"> <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label
                    for="tab-1" class="tab">Login</label> <input id="tab-2" type="radio" name="tab"
                    class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-space">
                    <div class="login">
                        <form action="comprobarUsuario.php" method="POST">
                        <input type="hidden"  name="eleccion" value="login">
                        <div class="group"> <label for="email" class="label">Correo Electronico</label> <input type="text"
                                class="input" name="email" placeholder="Introduce tu correo" required> </div>
                        <div class="group"> <label for="pass" class="label">Contraseña</label> <input type="password"
                                class="input" name="pass" data-type="password" placeholder="Introduce tu contraseña" required> </div>
                        <div class="group"> <input type="submit" class="button" value="Enviar"> </div>
                    </form>
                    </div>
                    <div class="sign-up-form">
                        <form action="comprobarUsuario.php" method="POST">
                        <input type="hidden"  name="eleccion" value="registro">
                            <div class="group"> <label for="user" class="label">Nombre</label> <input name="nombre"
                                    type="text" class="input" placeholder="Introduce tu nombre" required> </div>
                            <div class="group"> <label for="user" class="label">Apellidos</label> <input name="apellidos"
                                    type="text" class="input" placeholder="Introduce tus apellidos" required> </div>
                            <div class="group"> <label for="pass" class="label">Contraseña</label> <input name="pass"
                                    type="password" class="input" data-type="password"
                                    placeholder="Introduce tu contraseña" required> </div>
                            <div class="group"> <label for="passRep" class="label">Repite Contraseña</label> <input
                                    name="passRep" type="password" class="input" data-type="password"
                                    placeholder="Repite tu contraseña" required> </div>
                            <div class="group"> <label for="email" class="label">Direccion de Email</label>
                                <input name="email" type="text" class="input" placeholder="Introduce tu email" required>
                            </div>
                            <div class="group"> <label for="direccion" class="label">Direccion</label> <input name="direccion"
                                    type="text" class="input" placeholder="Introduce tu direccion" required> </div>
                            <div class="group"> <label for="telefono" class="label">Telefono</label> <input name="telefono"
                                    type="number" class="input" placeholder="Introduce tu telefono" required> </div>
                            <div class="group"> <input type="submit" class="button" value="Registrarse"> </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="py-5 " style="background-color: #0198f1;">
        <div class="container">
            <p class="m-0 text-center text-white">JOSE ANTONIO MARQUEZ GONZALEZ</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>