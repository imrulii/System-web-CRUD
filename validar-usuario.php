<?php
    include('db.php');
    if (isset ($_POST['Registrar'])){
        if (strlen ($_POST['regNombre']) >= 1 &&
        strlen ($_POST['regDNI']) >= 1 &&
        strlen ($_POST['regEdad']) >= 1 &&
        strlen ($_POST['regSexo']) >= 1 &&
        strlen ($_POST['regAltura']) >= 1 &&
        strlen ($_POST['regTelefono']) >= 1 &&
        strlen ($_POST['regNacionalidad']) >= 1 &&
        strlen ($_POST['regCiudad']) >= 1 &&
        strlen ($_POST['regCodPostal']) >= 1 &&
        strlen ($_POST['regDireccion']) >= 1 &&
        strlen ($_POST['regEmail']) >= 1) {

           
            $regDNI=trim($_POST['regDNI']);
            $pregunta="SELECT * FROM clientes where dniCliente = '$regDNI'"; 
            $numres=mysqli_query($conexion,$pregunta);
          
            if(mysqli_num_rows($numres) > 0){
                include ("crear-usuario.php");
                ?>
                <div class="alert alert-danger" role="alert">
                <h4>¡Ups el DNI ingresado ya existe!</h4>
                </div>
                <?php
            }
            else {
                $usuario=$_POST['usuario'];
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

                    $consulta="INSERT INTO clientes
                    (dniCliente,
                    NombreApellido,
                    Edad,
                    Sexo,
                    Nacionalidad,
                    Ciudad,
                    Direccion,
                    numTelefono,
                    codigoPostal,
                    Email,
                    fechaReg,
                    usuarioReg,
                    Altura)
                    VALUES
                    ('$regDNI',
                    '$regNombre',
                    '$regEdad',
                    '$regSexo',
                    '$regNacionalidad',
                    '$regCiudad',
                    '$regDireccion',
                    '$regTelefono',
                    '$regCodPostal',
                    '$regEmail',
                    '$regFecha',
                    '$usuario',
                    '$regAltura');
                    "; 
                if(mysqli_query($conexion,$consulta)) {
                header("location:usuarioform.php?mail=1");
                
                } }
            } else{
                include ("crear-usuario.php");
                ?>
                <div class="alert alert-warning" role="alert">
                <h4>¡Por favor complete todos los campos!</h4>
                </div>
                <?php
            }
        }
    ?>