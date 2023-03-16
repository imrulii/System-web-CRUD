<?php
include ("db.php");
$CODALQUILER=$_GET['CODALQUILER'];

$consulta="DELETE FROM alquiler where codAlquiler='$CODALQUILER'";
$resultado=mysqli_query($conexion, $consulta);
    if ($resultado) {
        header("location:alquilerform.php?mail=3");
    }

?>