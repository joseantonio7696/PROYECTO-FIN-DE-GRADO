<?php
include "./db_decatlon.php";

$valor=$_GET["valor"];

$sql="SELECT * FROM `producto` WHERE producto_nombre LIKE '$valor%'";
$result = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_array($result)) {
  echo "<p onclick='ponerValor(this)'>". $row["producto_nombre"] ."</p>" ;
  
}
mysqli_close($conexion);
?>