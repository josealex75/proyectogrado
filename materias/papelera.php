<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Notas</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
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
          <a class="nav-link" href="index.php">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../materias">Materias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../estudiantes">Estudiantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../grados">Grados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../notas">Notas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
  <!-- Sección de Gestión de Materia -->
  <section id="Materia">
    <h2>Gestión de Materia (Papelera)</h2>
    <div class="row">
      <div class="col-12">
        <a href="index.php" class="btn btn-primary mb-3 ms-3 float-end">
          <i class="bi bi-trash"></i> Materia
        </a>
        
      </div>
    </div>

    <hr>

    <?php
        require '../conexion.php';

        $sql = "SELECT * FROM materias WHERE estado = 0";
        $result = $conn->query($sql);
    
    // // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
    
    ?>

    <!-- Tabla de Materia -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>nombre</th>
            <th>contenido</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
               // Iterar sobre los resultados y mostrar los datos en la tabla
               while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["n_materia"] . "</td>";
                echo "<td>" . $row["contenido_materia"] . "</td>";
                echo "<td>";
                echo "<button class='btn btn-success btn-sm' onclick='habilitarMateria (" . $row["id_materia"] . ")'><i class='bi bi-pencil-fill'></i> Habilitar</button>";
                echo "</td>";
                echo "</tr>";
               }
          ?>
        </tbody>
      </table>
    </div>

    <?php
        }else {
            echo "<h2>No se encontraron resultados</h2>";
        }

    ?>
  </section>
</div>


<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  &copy; 2024 Gestión de Notas
</footer>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS (dependencias Popper.js y Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
function habilitarMateria(id) {
    // Realizar una solicitud AJAX para obtener los datos del profesor con el ID proporcionado
    $.ajax({
        url: 'habilitar.php', // Ruta al script PHP que obtiene los datos del profesor
        type: 'GET',
        data: { id: id },
        success: function(response) {
          alert('Materia Habilitada!');
          location.reload();
        },
        error: function(xhr, status, error) {
            // Manejar errores si la solicitud AJAX falla
            console.error(error);
        }
    });
}

</script>


</body>
</html>