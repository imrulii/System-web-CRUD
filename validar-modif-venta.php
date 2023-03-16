<?php
    include('db.php');
    if (isset ($_POST['Registrar'])){
        if (strlen ($_POST['regDescuento']) and
        strlen ($_POST['regPago']) and
        strlen ($_POST['regVenta']) and
        strlen ($_POST['regPrecio'])) {

            $CODVENTA=($_POST['CODVENTA']);
            $CODVEHICULO=($_POST['CODVEHICULO']);
            $DNI=($_POST['DNI']);
            $regDescuento=trim($_POST['regDescuento']);
            $regPago=trim($_POST['regPago']);
            $regVenta=trim($_POST['regVenta']);
            $regPrecio=trim($_POST['regPrecio']);
            
                $consulta="UPDATE venta
                SET
                fechaVenta = '$regVenta',
                precioVenta = '$regPrecio',
                Descuento = '$regDescuento',
                metodoPago = '$regPago'
                WHERE codVenta = '$CODVENTA' AND codVehiculo = '$CODVEHICULO' AND dniCliente = '$DNI';
                
                
                ";

            $resultado=mysqli_query($conexion,$consulta);
               if($resultado){
                header("location:ventasform.php?mail=2");
               } else {
                include ("modif-venta.php");
                ?>
                <div class="alert alert-danger" role="alert">
                <h4>¡Ups ha ocurrido un error!</h4>
                </div>
                <?php
               }
            } else{
                include ("modif-venta.php");
                ?>
                <div class="alert alert-warning" role="alert">
                <h4>¡Por favor complete todos los campos!</h4>
                </div>
                <?php
            }
        }
    ?>