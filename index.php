<?php


// confirmar sesion

session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Notas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="loggedin">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Gestión de Notas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="profesores">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="materias">Materias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="estudiantes">Estudiantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="grados">Grados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#notas">Notas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="periodos">periodos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="cerrar-sesion.php">Cerrar Seccion</a>
      </li>
      <li class="nav-item">
      <p aling="left">Hola de nuevo, <?= $_SESSION['name'] ?> !!!</p>
      </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<!-- Main Content -->
<div class="container mt-4">
  <!-- Dashboard -->
  <section id="dashboard">
    <h2>Dashboard</h2>
    <div class="row">
      <!-- Indicador de Total de Profesores -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total de Profesores</h5>
            <!-- Aquí puedes mostrar el número total de profesores registrados -->
            <p class="card-text">150</p>
          </div>
        </div>
      </div>
      <!-- Indicador de Total de Estudiantes -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total de Estudiantes</h5>
            <!-- Aquí puedes mostrar el número total de estudiantes registrados -->
            <p class="card-text">1200</p>
          </div>
        </div>
      </div>
      <!-- Indicador de Total de Materias -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total de Materias</h5>
            <!-- Aquí puedes mostrar el número total de materias registradas -->
            <p class="card-text">25</p>
          </div>
        </div>
      </div>
      <!-- Indicador de Promedio de Notas -->
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Total de grupos</h5>
            <!-- Aquí puedes mostrar el promedio general de notas -->
            <p class="card-text">8</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  &copy; 2024 Gestión de Notas
</footer>

<!-- Bootstrap JS (dependencias Popper.js y jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="assets/js/index.js"></script>
</body>
</html>