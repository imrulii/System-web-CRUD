<?php include ('db.php');
      $datos= [];
      $sql=("SELECT Marca, Modelo, Precio, origenPais, count(*) as registro FROM venta 
      inner join vehiculos on venta.codVehiculo= vehiculos.codVehiculo GROUP BY Modelo");
      $query=mysqli_query($conexion, $sql);
      while ($row=mysqli_fetch_array($query)){
        $datos []= $row;
      }

      
      session_start();
      error_reporting(0);
      $varsesion=$_SESSION['usuario'];
      if($varsesion== null || $varsesion=''){
        header("location:index.php");
        die();
}


  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos/css/bootstrap.min.css" rel="stylesheet">
    <script src="estilos/js/bootstrap.bundle.min.js"></script>
    <script src="js\buscador.js"></script>
    <title>Consulta de ventas</title>
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
        <li><a href="descargar/Manual de usuario Sistema web CRUD.pdf" class="nav-link px-2 text-white" download="Manual de usuario.pdf">Tutorial</a></li>
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
    Consultas de Ventas de Vehiculos
  </h4>
</div>
  </div>
  <div class="ms-2 me-2 table-responsive">
  <table class="table table-striped table-hover table_id">
    <thead>
      <tr>
        <th scope="col">CANTIDAD VENDIDA</th>
        <th scope="col">MARCA</th>
        <th scope="col">MODELO</th>
        <th scope="col">PAIS</th>
        <th scope="col">PRECIO LISTA</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for($i=0; $i < count($datos); $i++){
      ?>
        <tr>  
        <td><?php echo $datos [$i] ['registro']?></td>  
        <td><?php echo $datos [$i] ['Marca']?></td>  
        <td><?php echo $datos [$i] ['Modelo']?></td>
        <td><?php echo $datos [$i] ['origenPais']?></td>
        <td>$<?php echo $datos [$i] ['Precio']?></td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  <a href="venta-pdf.php" class="btn btn-danger">Imprimir consulta</a>
  </div>
<br>
<?php 
    if(isset($_SESSION['message'])) {?>
  <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show m-auto" role="alert">
  <?= $_SESSION['message']?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
   <?php session_unset(); } ?>

   
</body>
</html>