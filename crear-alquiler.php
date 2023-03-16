<?php
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
    
    <title>Nuevo registro</title>
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
        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Buscar..." aria-label="Search">
        </form>
        <div class="text-end">
        <a href="cerrar-sesion.php" class="btn btn-danger px-2" > Cerrar sesion</a>
        </div>
      </div>
    </div>
  </header>

    <form class="row g-3 m-auto" action="validar-alquiler.php" method="post">
        <div class="col-md-4">
          <label class="form-label">Codigo de Alquiler</label>
          <input type="number" class="form-control" name="regCodAlquiler">
        </div>

        <div class="col-md-4">
          <label class="form-label">Codigo del vehiculo</label>
          <input type="number" class="form-control" name="regCodVehiculo">
        </div>

        <div class="col-md-4">
          <label class="form-label">DNI del cliente</label>
          <input type="number" class="form-control" name="regDNI">
        </div>

          <div class="col-md-6">
            <label class="form-label">Metodo de pago</label>
            <select class="form-select" aria-label="Default select example" name="regPago">
              <option value="Efectivo">Efectivo</option>
              <option value="Tarjeta">Tarjeta</option>
              <option value="Transferencia">Transferencia</option>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Precio</label>
            <input type="number" class="form-control" placeholder="1233" name="regPrecio">
          </div>

        <div class="col-md-6">
          <label class="form-label">Fecha de Alquiler</label>
          <input type="date" class="form-control" placeholder="1998/12/05" name="regAlquiler">
        </div>

        <div class="col-md-6">
            <label class="form-label">Fecha de Devolucion</label>
            <input type="date" class="form-control" placeholder="1998/12/05" name="regDevolucion">
          </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="Registrar">Registrar</button>
          <a href="alquilerform.php" class="btn btn-danger">Volver</a>
        </div>
      </form>
      <br>
</body>
</html>