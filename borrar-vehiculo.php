<?php
include ("db.php");
$CODVEHICULO=$_GET['CODVEHICULO'];

$consulta="DELETE FROM vehiculos where codVehiculo='$CODVEHICULO'";
$resultado=mysqli_query($conexion, $consulta);
    if ($resultado) {
        header("location:vehiculoform.php?mail=3");
    }

?>