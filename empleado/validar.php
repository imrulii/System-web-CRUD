<?php 
include('db.php');

$USUARIO=$_POST['usuario'];
$CONTRASEÑA=$_POST['password'];
session_start();
$_SESSION['usuario']=$USUARIO;

$consulta = "SELECT * FROM Usuarios where usuario = '$USUARIO' and password = '$CONTRASEÑA'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas){
    header("location:home.php");

}
else {
    $_SESSION['message'] = '¡Datos incorrectos!';
    $_SESSION['message_type'] = 'danger';
    include("index.php");
}
mysqli_free_result($resultado);
mysqli_close($conexion);


?>