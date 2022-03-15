<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><%= producto.getProducto_nombre()%></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="estilos/estilosInicio.css" rel="stylesheet" />



    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0198f1 ">
            <div class="container-fluid">
                <a class="navbar-brand" href="paginaInicioCliente.jsp">

                    <img src="imagenes/Decathlon_Logo.png" alt="" width="150" height="50">

                </a>


                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        CATEGORIAS
                    </button>
                    <ul class="dropdown-menu">

                        <li><a href="materiales.jsp" class="list-group-item list-group-item-action">Materiales deportivos</a></li>
                        <li><a href="entrenamiento.jsp" class="list-group-item list-group-item-action">Entrenamiento Funcional</a></li>
                        <li><a href="protecciones.jsp" class="list-group-item list-group-item-action">Protecciones deportivas</a></li>
                        <li><a href="singular.jsp" class="list-group-item list-group-item-action ">Singular Wod</a></li>
                    </ul>
                </div>




                <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>-->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <form class="d-flex" action="carritoCompras.jsp">
                            <button class="btn btn-outline-dark" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                </svg>
                                <span class="badge bg-dark text-white ms-1 rounded-pill"><%= contadorArticulos%></span>
                            </button>
                        </form>
                        <!--                        <li class="nav-item"><a class="nav-link fw-bold " aria-current="page" href="paginaInicioCliente.html">Carrito</a></li>-->
                        <li class="nav-item"><a class="nav-link fw-bold"  href="cerrarSesion">Cerrar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        
                          

        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="imagenes/<%= producto.getProducto_foto()%>" alt="..." /></div>
                    <div class="col-md-6">

                        <h1 class="display-5 fw-bolder"><%= producto.getProducto_nombre()%></h1>
                        <div class="fs-5 mb-5">
                            <%
                                        if (producto.getProducto_precio()==producto.getProducto_precio_venta()) {
                                     %>
                                     <div ><%= producto.getProducto_precio()%> €</div>
                                     <%
                                            } else {
                                      %>    
                                      <div class="text-decoration-line-through"><%= producto.getProducto_precio()%> €</div>
                                    <%= Math.round(producto.getProducto_precio_venta()*100.0)/100.0 %> €
                                    <%
                                            }
                                    %>
                            
                        </div>
                        <p class="lead"><%= producto.getProducto_detalle()%></p>
                        <div class="d-flex">
                            <form action="agregarProducto" method="POST">
                                <input class="form-control text-center me-3" id="inputQuantity" type="number" name="cantidad" min="1" value="1" style="max-width: 5rem"/>
                                <input  type="text" hidden value="<%=producto.getProducto_id()%>" name="idProducto"/>
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
            <div class="container"><p class="m-0 text-center text-white">JOSE ANTONIO MARQUEZ GONZALEZ</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>