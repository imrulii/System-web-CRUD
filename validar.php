<?php 
include('db.php');

$USUARIO=$_POST['usuario'];
$CONTRASEÑA=$_POST['password'];
session_start();
$_SESSION['usuario']=$USUARIO;

$consulta = "SELECT * FROM Usuarios where usuario = '$USUARIO' and password = '$CONTRASEÑA'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas['Cargo']==1){
    header("location:home.php");

}
else if($filas['Cargo']==2){
    header("location:empleado/home.php");
}
else {
    header("location:index.php?mail=1");
}
mysqli_free_result($resultado);
mysqli_close($conexion);


?>