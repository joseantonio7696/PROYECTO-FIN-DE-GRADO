
<?php
include "./db_decatlon.php";

$sql="SELECT * FROM usuario";
$result = mysqli_query($conexion,$sql);


while($row = mysqli_fetch_array($result)) {
  echo "<option value=" . $row["usuario_id"] . " > " . $row["usuario_nombre"] . " " . $row["usuario_apellidos"] . "</option>";
}
mysqli_close($conexion);
?>