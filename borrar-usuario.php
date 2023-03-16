<?php
include ("db.php");
$DNI=$_GET['DNI'];

$consulta="DELETE FROM clientes where dniCliente='$DNI'";
$resultado=mysqli_query($conexion, $consulta);
    if ($resultado) {
        header("location:usuarioform.php?mail=3");
    }

?>