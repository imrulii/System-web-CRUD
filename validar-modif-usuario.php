<?php
include ('db.php');
if (isset($_POST['Modificar'])){
    if(strlen($_POST['regNombre']) and
    strlen($_POST['regEdad']) and
    strlen($_POST['regSexo']) and
    strlen($_POST['regTelefono']) and
    strlen($_POST['regEmail']) and
    strlen($_POST['regNacionalidad']) and
    strlen($_POST['regCiudad']) and
    strlen($_POST['regCodPostal']) and
    strlen($_POST['regDireccion']) and
    strlen($_POST['regAltura'])){

        $usuario=$_POST['usuario'];
        $DNI=($_POST['DNI']);
        $regNombre=trim($_POST['regNombre']);
        $regEdad=trim($_POST['regEdad']);
        $regSexo=trim($_POST['regSexo']);
        $regTelefono=trim($_POST['regTelefono']);
        $regNacionalidad=trim($_POST['regNacionalidad']);
        $regCiudad=trim($_POST['regCiudad']);
        $regCodPostal=trim($_POST['regCodPostal']);
        $regDireccion=trim($_POST['regDireccion']);
        $regEmail=trim($_POST['regEmail']);
        $regAltura=trim($_POST['regAltura']);
        $regFecha= date("y/m/d");

        $consulta="UPDATE clientes SET
        NombreApellido =  '$regNombre',
        Edad = '$regEdad',
        Sexo = '$regSexo',
        Nacionalidad = '$regNacionalidad',
        Ciudad = '$regCiudad',
        Direccion= '$regDireccion',
        numTelefono = '$regTelefono',
        codigoPostal = '$regCodPostal',
        Email = '$regEmail',
        fechaReg = '$regFecha',
        usuarioReg = '$usuario',
        Altura = '$regAltura'
        WHERE dniCliente = '$DNI';
        ";
    $resultado=mysqli_query($conexion, $consulta);
    if($resultado){
        header("location:usuarioform.php?mail=2");
       } else {
        include ("modif-usuario.php");
        ?>
        <div class="alert alert-danger" role="alert">
        <h4>¡Ups ha ocurrido un error!</h4>
        </div>
        <?php
       }
    } else{
        include ("modif-usuario.php");
        ?>
        <div class="alert alert-warning" role="alert">
        <h4>¡Por favor complete todos los campos!</h4>
        </div>
        <?php
    }
    }
    

?>