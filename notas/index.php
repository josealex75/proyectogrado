<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Notas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Gestión de Notas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../profesores">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../materias">Materias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../estudiantes">Estudiantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../grados">Grados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../periodos">periodos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Notas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
  <!-- Sección de Calificaciones de Estudiantes -->
  <section id="calificaciones">
    <h2>Calificaciones de Estudiantes</h2>
    <div class="row">
      <!-- Botones y controles para agregar o filtrar calificaciones -->
    </div>

    <hr>

    <!-- Tabla de calificaciones de estudiantes -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Estudiante</th>
            <th>Materia</th>
            <th>Calificación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Aquí mostrarías la lista de calificaciones de estudiantes -->
        </tbody>
      </table>
    </div>
  </section>
</div>

<!-- Modal para agregar o editar calificaciones -->
<div class="modal fade" id="calificarEstudianteModal" tabindex="-1" aria-labelledby="calificarEstudianteModalLabel" aria-hidden="true">
  <!-- Contenido del modal para agregar o editar calificaciones -->
</div>


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  &copy; 2024 Gestión de Notas
</footer>

</body>


</html>