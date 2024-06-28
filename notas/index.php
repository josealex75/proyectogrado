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
        <?php
             require '../conexion.php';

             $sql = "SELECT u.usuario AS usuario, p.n_periodo AS periodo, m.n_materia AS materia, n.nota AS nota FROM usuarios u JOIN roles r ON u.id_rol = r.id_rol JOIN notas n ON u.id_usuario = n.id_usuario JOIN periodos p ON n.id_periodo = p.id_periodo JOIN materias m ON n.id_materia = m.id_materia JOIN grados g ON m.id_grado = g.id_grado WHERE r.id_rol = 2;";
             $result = $conn->query($sql);
            
            // // Verificar si se encontraron resultados
             if ($result->num_rows > 0) {
            //   // Iterar sobre los resultados y mostrar los datos en la tabla
               while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_usuario"] . "</td>";
                echo "<td>" . $row["n_materia"] . "</td>";
                echo "<td>" . $row["n_nota"] . "</td>";
                echo "<td>";
                echo "<button class='btn btn-success btn-sm' onclick='editarProfesor (" . $row["id_usuario"] . ")'><i class='bi bi-pencil-fill'></i> Editar</button>";
                if($row['estado'] == 1 )
                echo "<button class='btn btn-danger btn-sm ms-2' onclick=\"location.href='deshabilitar.php?id=" . $row['id_usuario'] . "'\"><i class='bi bi-x-circle-fill'></i> Deshabilitar</button>";
                                 
                echo "</td>";
                echo "</tr>";
               }
             } else {
               echo "No se encontraron resultados";
             }

          ?>
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