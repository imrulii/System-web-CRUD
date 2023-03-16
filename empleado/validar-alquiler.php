<?php
    include('db.php');
    if (isset ($_POST['Registrar'])){
        if (strlen ($_POST['regCodAlquiler']) >= 1 &&
        strlen ($_POST['regCodVehiculo']) >= 1 &&
        strlen ($_POST['regDNI']) >= 1 &&
        strlen ($_POST['regPago']) >= 1 &&
        strlen ($_POST['regAlquiler']) >= 1 &&
        strlen ($_POST['regDevolucion']) >= 1 &&
        strlen ($_POST['regPrecio'])) {

            $regCodAlquiler=trim($_POST['regCodAlquiler']);
            $regDNI=trim($_POST['regDNI']);
            $regCodVehiculo=trim($_POST['regCodVehiculo']);
            $regPago=trim($_POST['regPago']);
            $regAlquiler=trim($_POST['regAlquiler']);
            $regDevolucion=trim($_POST['regDevolucion']);
            $regPrecio=trim($_POST['regPrecio']);
            
                $consulta="INSERT INTO alquiler
                (codAlquiler,
                codVehiculo,
                dniCliente,
                fechaAlquiler,
                fechaDevolucion,
                precioAlquiler,
                metodoPago)
                VALUES
                ('$regCodAlquiler',
                '$regCodVehiculo',
                '$regDNI',
                '$regAlquiler',
                '$regDevolucion',
                '$regPrecio',
                '$regPago');
                
                ";

            $resultado=mysqli_query($conexion,$consulta);
               if($resultado){
                header("location:alquilerform.php?mail=1");
               } else {
                include ("crear-alquiler.php");
                ?>
                <div class="alert alert-danger" role="alert">
                <h4>¡Ups ha ocurrido un error!</h4>
                </div>
                <?php
               }
            } else{
                include ("crear-alquiler.php");
                ?>
                <div class="alert alert-warning" role="alert">
                <h4>¡Por favor complete todos los campos!</h4>
                </div>
                <?php
            }
        }
    ?>