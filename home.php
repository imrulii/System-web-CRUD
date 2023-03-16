<?php
session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
if($varsesion== null || $varsesion=''){
  header("location:index.php");
  die();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Home</title>

<link href="estilos/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="estilos/css/headers.css">
<link rel="stylesheet" href="estilos/css/nav-bs-negro.css">
<link rel="stylesheet" href="estilos/css/backgroundbody.css">
<script src="estilos/js/bootstrap.bundle.min.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
   
  <link href="headers.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  
  <header class="p-3 text-bg-dark">
    <div class="container" class="nav-bs-negro" >
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <p class="nav col-lg-auto me-lg-5 justify-content-center"> <?php echo $_SESSION ['usuario']?></p>
        <a href="home.php" class=" d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
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
</main>    
<div class=" my-5 container overflow-hidden text-center ">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 text-light "><svg width="500" height="600" fill="currentColor" class="bi bi-unity" viewBox="0 0 16 16">
        <path d="M15 11.2V3.733L8.61 0v2.867l2.503 1.466c.099.067.099.2 0 .234L8.148 6.3c-.099.067-.197.033-.263 0L4.92 4.567c-.099-.034-.099-.2 0-.234l2.504-1.466V0L1 3.733V11.2v-.033.033l2.438-1.433V6.833c0-.1.131-.166.197-.133L6.6 8.433c.099.067.132.134.132.234v3.466c0 .1-.132.167-.198.134L4.031 10.8l-2.438 1.433L7.983 16l6.391-3.733-2.438-1.434L9.434 12.3c-.099.067-.198 0-.198-.133V8.7c0-.1.066-.2.132-.233l2.965-1.734c.099-.066.197 0 .197.134V9.8L15 11.2Z"/>
        </svg>
          </div>
    </div>
    <div class="col">
      <div class="p-3">
        <div class="my-5 alert alert-light" style role="alert">
    
    <p class="display-1 text-center">Bienvenido <strong><?php echo $_SESSION['usuario']?></strong> Al sistema de gestion de base de datos</p>
    </div>
  </div>
    </div>
  </div>
</div>
  </body>
</html>
