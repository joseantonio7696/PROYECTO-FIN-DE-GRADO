<?php

session_start();

$correo = $contrasena = "";


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($_POST["eleccion"]=="login"){


        $correo=$_POST["email"];
        $contrasena=$_POST["pass"];

        include "./db_decatlon.php";

        $consulta = mysqli_query($conexion, "select *
                        from usuario where usuario_email='$correo'") or
    die("Problemas en el select:" . mysqli_error($conexion));

    if ($reg = mysqli_fetch_array($consulta)) {

        $claveComprobar=$reg['usuario_password'];

        mysqli_close($conexion);

        if (password_verify($contrasena,$claveComprobar)) {
    
                

            $url="./index.php";
            $_SESSION["sesion"]=$reg;
            header("Location: ".$url);
        }else{

            
            $url="./iniciarSesion.php";
            header("Location: ".$url);
        }

        

    }

    }else{

            $nombre=test_input($_POST["nombre"]);

            $apellidos=test_input($_POST["apellidos"]);
        
            $correo = test_input($_POST["email"]);
          
            $contrasena = test_input($_POST["pass"]);
            $contrasenaHash = password_hash($contrasena,PASSWORD_DEFAULT);

            $direccion=test_input($_POST["email"]);

            $telefono=test_input($_POST["telefono"]);
          
      
          include "./db_decatlon.php";
        
          $consulta = mysqli_query($conexion, "select usuario_email
                                from usuario where usuario_email='$correo'") or
            die("Problemas en el select:" . mysqli_error($conexion));
        
          if (!mysqli_fetch_array($consulta)) {

            mysqli_query($conexion, "INSERT INTO usuario (usuario_nombre, usuario_apellidos, usuario_tipo, usuario_email, usuario_password, usuario_direccion, usuario_telefono)
            VALUES ('$nombre','$apellidos','Cliente','$correo','$contrasenaHash','$direccion','$telefono')")
            or die("Problemas en el select " . mysqli_error($conexion));
         
          }
          mysqli_close($conexion);

          $url="./iniciarSesion.php";
            header("Location: ".$url);
    }

}

?>