<?php
    include('db.php');
    if (isset ($_POST['Registrar'])){
        if (strlen ($_POST['regCodVenta']) >= 1 &&
        strlen ($_POST['regCodVehiculo']) >= 1 &&
        strlen ($_POST['regDNI']) >= 1 &&
        strlen ($_POST['regDescuento']) >= 1 &&
        strlen ($_POST['regPago']) >= 1 &&
        strlen ($_POST['regVenta']) >= 1 &&
        strlen ($_POST['regPrecio'])) {

            $regCodVenta=trim($_POST['regCodVenta']);
            $regDNI=trim($_POST['regDNI']);
            $regCodVehiculo=trim($_POST['regCodVehiculo']);
            $regDescuento=trim($_POST['regDescuento']);
            $regPago=trim($_POST['regPago']);
            $regVenta=trim($_POST['regVenta']);
            $regPrecio=trim($_POST['regPrecio']);
            
                $consulta="INSERT INTO venta
                (codVenta,
                codVehiculo,
                dniCliente,
                fechaVenta,
                precioVenta,
                Descuento,
                metodoPago)
                VALUES
                ('$regCodVenta',
                '$regCodVehiculo',
                '$regDNI',
                '$regVenta',
                '$regPrecio',
                '$regDescuento',
                '$regPago');
                
                ";

            $resultado=mysqli_query($conexion,$consulta);
               if($resultado){
                header("location:ventasform.php?mail=1");
               } else {
                include ("crear-venta.php");
                ?>
                <div class="alert alert-danger" role="alert">
                <h4>¡Ups ha ocurrido un error!</h4>
                </div>
                <?php
               }
            } else{
                include ("crear-venta.php");
                ?>
                <div class="alert alert-warning" role="alert">
                <h4>¡Por favor complete todos los campos!</h4>
                </div>
                <?php
            }
        }
    ?>