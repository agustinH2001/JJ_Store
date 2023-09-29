<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JJ Store</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
</head>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-black navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home.php" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="crud.php" class="nav-link">CRUD</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="login_interface.php" class="nav-link">Login</a>
      </li>
    </ul>
  
  </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="images\logo.png" alt="LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JJ Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["nombre-usuario"]?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="home.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Widgets
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="home.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Periféricos
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Teclados</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ratones</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Auriculares</p>
                    </a>
                </li>
                <!-- Agrega más categorías de periféricos aquí -->
            </ul>
        </li>
        <li class="nav-item">
            <a href="home.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Componentes
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Procesadores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tarjetas gráficas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Memoria RAM</p>
                    </a>
                </li>
                <!-- Agrega más categorías de componentes aquí -->
            </ul>
        </li>
        <li class="nav-item">
            <a href="home.php" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                    Pantallas
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Monitores LCD</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pantallas LED</p>
                    </a>
                </li>
                <!-- Agrega más categorías de pantallas aquí -->
            </ul>
        </li>
        <!-- Agrega más categorías de productos de computación aquí -->
    </ul>
</nav>
<!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>