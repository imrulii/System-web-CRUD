<?php
include ("db.php");
$CODVENTA=$_GET['CODVENTA'];

$consulta="DELETE FROM venta where codVenta='$CODVENTA'";
$resultado=mysqli_query($conexion, $consulta);
    if ($resultado) {
        header("location:ventasform.php?mail=3");
    }

?>