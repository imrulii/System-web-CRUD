<?php
    include('db.php');
    if (isset ($_POST['Modificar'])){
        if (strlen ($_POST['regPago']) and
        strlen ($_POST['regAlquiler']) and
        strlen ($_POST['regDevolucion']) and
        strlen ($_POST['regPrecio'])) {

            $CODALQUILER=($_POST['CODALQUILER']);
            $CODVEHICULO=($_POST['CODVEHICULO']);
            $DNI=($_POST['DNI']);
            $regPago=trim($_POST['regPago']);
            $regAlquiler=trim($_POST['regAlquiler']);
            $regDevolucion=trim($_POST['regDevolucion']);
            $regPrecio=trim($_POST['regPrecio']);
            
                $consulta="UPDATE alquiler
                SET
                fechaAlquiler = '$regAlquiler',
                fechaDevolucion = '$regDevolucion',
                precioAlquiler = '$regPrecio',
                metodoPago = '$regPago'
                WHERE codAlquiler = $CODALQUILER AND codVehiculo = $CODVEHICULO AND dniCliente = $DNI;
                
                ";

            $resultado=mysqli_query($conexion,$consulta);
               if($resultado){
                header("location:alquilerform.php?mail=2");
               } else {
                include ("modif-alquiler.php");
                ?>
                <div class="alert alert-danger" role="alert">
                <h4>¡Ups ha ocurrido un error!</h4>
                </div>
                <?php
               }
            } else{
                include ("modif-alquiler.php");
                ?>
                <div class="alert alert-warning" role="alert">
                <h4>¡Por favor complete todos los campos!</h4>
                </div>
                <?php
            }
        }
    ?>