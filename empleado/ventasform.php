<?php include ('db.php');
      $datos= [];
      $sql=("SELECT * FROM venta 
      inner join clientes on venta.dniCliente= clientes.dniCliente
      inner join vehiculos on venta.codVehiculo= vehiculos.codVehiculo");
      $query=mysqli_query($conexion, $sql);
      while ($row=mysqli_fetch_array($query)){
        $datos []= $row;
      }

      session_start();
      error_reporting(0);
      $varsesion=$_SESSION['usuario'];
      if($varsesion== null || $varsesion=''){
        header("location:../index.php");
        die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../estilos/css/bootstrap.min.css" rel="stylesheet">
    <script src="../estilos/js/bootstrap.bundle.min.js"></script>
    <script src="../js/buscador.js"></script>
    <title>Formulario de ventas</title>
</head>
<body>
  <header class="p-3 text-bg-dark">
    <div class="container" class="nav-bs-negro" >
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <p class="nav col-12 col-lg-auto me-lg-5 justify-content-center"><?php echo $_SESSION ['usuario']?></p>
        <a href="home.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg  width="32" height="32" fill="currentColor" class="bi bi-database-fill" viewBox="0 0 16 16">
          <path d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223Z"/>
          <path d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
          <path d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
          <path d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972Z"/>
          </svg>
          </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="home.php" class="nav-link px-2 text-white">Home</a></li>
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Formularios</button>
        <ul class="dropdown-menu dropdown-menu-dark">
          <li><a class="dropdown-item" href="usuarioform.php">Clientes</a></li>
          <li><a class="dropdown-item" href="vehiculoform.php">Vehiculos</a></li>
          <li><a class="dropdown-item" href="ventasform.php">Ventas</a></li>
          <li><a class="dropdown-item" href="alquilerform.php">Alquileres</a></li>
        </ul>
        </li>
        </ul>
        <li class="nav-item dropdown">
        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Consultas</button>
        <ul class="dropdown-menu dropdown-menu-dark">
          <li><a class="dropdown-item" href="consulta-cliente.php">Clientes</a></li>
          <li><a class="dropdown-item" href="consulta-venta.php">Ventas</a></li>
          <li><a class="dropdown-item" href="consulta-alquiler.php">Alquileres</a></li>
        </ul>
        </li>
        <li><a href="../descargar/Manual de usuario Sistema web CRUD.pdf" class="nav-link px-2 text-white" download="Manual de usuario.pdf">Tutorial</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
        <input type="text" class="form-control form-control-dark text-bg-dark light-table-filter" placeholder="Buscar..." data-table="table_id" aria-label="Search">
        </form>
        <div class="text-end">
        <a href="cerrar-sesion.php" class="btn btn-danger px-2" > Cerrar sesion</a>
        </div>
      </div>
    </div>
  </header>
  <div class="ms-2 me-2">
  <div class="alert alert-dark" role="alert">
  <h4 style="text-align: center;">
    Formulario de ventas
  </h4>
</div>
  </div>
  <div class="ms-2 me-2 table-responsive">
  <table class="table table-striped table-hover table_id">
    <thead>
      <tr>
        <th scope="col">COD VENTA</th>
        <th scope="col">COD VEHICULO</th>
        <th scope="col">MARCA</th>
        <th scope="col">MODELO</th>
        <th scope="col">DNI CLIENTE</th>
        <th scope="col">CLIENTE</th>
        <th scope="col">NUM TELEFONO</th>
        <th scope="col">DESCUENTO</th>
        <th scope="col">METODO PAGO</th>
        <th scope="col">FECHA VENTA</th>
        <th scope="col">PRECIO LISTA</th>
        <th scope="col">PRECIO VENTA</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for($i=0; $i < count($datos); $i++){
        ?>
        <tr>
        <td><?php echo $datos [$i] ['codVenta']?></td>
        <td><?php echo $datos [$i] ['codVehiculo']?></td>
        <td><?php echo $datos [$i] ['Marca']?></td>
        <td><?php echo $datos [$i] ['Modelo']?></td>
        <td><?php echo $datos [$i] ['dniCliente']?></td>
        <td><?php echo $datos [$i] ['NombreApellido']?></td>
        <td><?php echo $datos [$i] ['numTelefono']?></td>
        <td><?php echo $datos [$i] ['Descuento']?></td>
        <td><?php echo $datos [$i] ['metodoPago']?></td>
        <td><?php echo $datos [$i] ['fechaVenta']?></td>
        <td>$<?php echo $datos [$i] ['Precio']?></td>
        <td>$<?php echo $datos [$i] ['precioVenta']?></td>
        <td><a href="modif-venta.php?CODVENTA=<?php echo $datos [$i] ['codVenta']?>" class="btn btn-warning"><svg  width="22" height="22" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
        </svg>
        </a></td>
      </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  <a href="crear-venta.php" class="btn btn-success">Nuevo registro</a>
  </div>
<br>
<?php
if(isset($_GET['mail']) && $_GET['mail'] == 1){ 
 echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  ¡Registro creado exitosamente!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} else if ($_GET['mail'] == 2){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  ¡Registro modificado exitosamente!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
</body>
</html>