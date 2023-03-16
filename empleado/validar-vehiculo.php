<?php
    include('db.php');
    if (isset ($_POST['Registrar'])){
        if (strlen ($_POST['regMarca']) >= 1 &&
        strlen ($_POST['regModelo']) >= 1 &&
        strlen ($_POST['regCodVehiculo']) >= 1 &&
        strlen ($_POST['regPais']) >= 1 &&
        strlen ($_POST['regIngreso']) >= 1 &&
        strlen ($_POST['regUsado']) >= 1 &&
        strlen ($_POST['regKilometraje']) >= 1 &&
        strlen ($_POST['regCombustible']) >= 1 &&
        strlen ($_POST['regCaja']) >= 1 &&
        strlen ($_POST['regTransmision']) >= 1 &&
        strlen ($_POST['regPrecio']) >= 1 &&
        strlen ($_POST['regCantidad'])) {

            $regMarca=trim($_POST['regMarca']);
            $regModelo=trim($_POST['regModelo']);
            $regCodVehiculo=trim($_POST['regCodVehiculo']);
            $regPais=trim($_POST['regPais']);
            $regIngreso=trim($_POST['regIngreso']);
            $regUsado=trim($_POST['regUsado']);
            $regKilometraje=trim($_POST['regKilometraje']);
            $regCombustible=trim($_POST['regCombustible']);
            $regCaja=trim($_POST['regCaja']);
            $regTransmision=trim($_POST['regTransmision']);
            $regPrecio=trim($_POST['regPrecio']);
            $regCantidad=trim($_POST['regCantidad']);
                $consulta="INSERT INTO vehiculos
                (codVehiculo,
                Marca,
                Modelo,
                origenPais,
                fechaIngreso,
                Usado,
                Kilometraje,
                Combustible,
                Caja,
                Transmision,
                Precio,
                Cantidad)
                VALUES
                ('$regCodVehiculo',
                '$regMarca',
                '$regModelo',
                '$regPais',
                '$regIngreso',
                '$regUsado',
                '$regKilometraje',
                '$regCombustible',
                '$regCaja',
                '$regTransmision',
                '$regPrecio',
                '$regCantidad');
                
                ";

            $resultado=mysqli_query($conexion,$consulta);
               if($resultado){
                header("location:vehiculoform.php?mail=1");
               } else {
                include ("crear-vehiculo.php");
                ?>
                <div class="alert alert-danger" role="alert">
                <h4>¡Ups ha ocurrido un error!</h4>
                </div>
                <?php
               }
            } else{
                include ("crear-vehiculo.php");
                ?>
                <div class="alert alert-warning" role="alert">
                <h4>¡Por favor complete todos los campos!</h4>
                </div>
                <?php
            }
        }
    ?>