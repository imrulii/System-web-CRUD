<?php
    include('db.php');
    if (isset ($_POST['Modificar'])){
        if (strlen ($_POST['regMarca']) and
        strlen ($_POST['regModelo']) and
        strlen ($_POST['regPais']) and
        strlen ($_POST['regIngreso']) and
        strlen ($_POST['regUsado']) and
        strlen ($_POST['regKilometraje']) and
        strlen ($_POST['regCombustible']) and
        strlen ($_POST['regCaja']) and
        strlen ($_POST['regTransmision']) and
        strlen ($_POST['regCantidad']) and
        strlen ($_POST['regPrecio'])) {

            $CODVEHICULO=($_POST['CODVEHICULO']);
            $regMarca=trim($_POST['regMarca']);
            $regModelo=trim($_POST['regModelo']);
            $regPais=trim($_POST['regPais']);
            $regIngreso=trim($_POST['regIngreso']);
            $regUsado=trim($_POST['regUsado']);
            $regKilometraje=trim($_POST['regKilometraje']);
            $regCombustible=trim($_POST['regCombustible']);
            $regCaja=trim($_POST['regCaja']);
            $regTransmision=trim($_POST['regTransmision']);
            $regPrecio=trim($_POST['regPrecio']);
            $regCantidad=trim($_POST['regCantidad']);
            
                $consulta="UPDATE vehiculos
                SET
                Marca = '$regMarca',
                Modelo = '$regModelo',
                origenPais = '$regPais',
                fechaIngreso = '$regIngreso',
                Usado = '$regUsado',
                Kilometraje = '$regKilometraje',
                Combustible = '$regCombustible',
                Caja = '$regCaja',
                Transmision = '$regTransmision',
                Precio = '$regPrecio',
                Cantidad = '$regCantidad'
                WHERE codVehiculo = '$CODVEHICULO'";
                

            $resultado=mysqli_query($conexion,$consulta);
               if($resultado){
                header("location:vehiculoform.php?mail=2");
               } else {
                include ("modif-vehiculo.php");
                ?>
                <div class="alert alert-danger" role="alert">
                <h4>¡Ups ha ocurrido un error!</h4>
                </div>
                <?php
               }
            } else{
                include ("modif-vehiculo.php");
                ?>
                <div class="alert alert-warning" role="alert">
                <h4>¡Por favor complete todos los campos!</h4>
                </div>
                <?php
            }
        }
    ?>