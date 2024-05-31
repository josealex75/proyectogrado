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
          <a class="nav-link active" href="index.php">Materias</a>
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
          <a class="nav-link" href="../notas">Notas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
  <!-- Sección de Gestión de Materias -->
  <section id="Materias">
    <h2>Gestión de Materias</h2>
    <div class="row">
      <div class="col-12">
        <a href="papelera.php" class="btn btn-warning mb-3 ms-3 float-end">
          <i class="bi bi-trash"></i> Papelera
        </a>
        <!-- Botón para agregar nuevo Materias -->
        <button class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#agregarMateriaModal">
          <i class="bi bi-plus"></i> Agregar Materia
        </button>
        
      </div>
    </div>

    <hr>

    <!-- Tabla de Materias -->
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
             require '../conexion.php';

             $sql = "SELECT * FROM materias WHERE estado = 1";
             $result = $conn->query($sql);
            
            // // Verificar si se encontraron resultados
             if ($result->num_rows > 0) {
            //   // Iterar sobre los resultados y mostrar los datos en la tabla
               while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["n_materia"] . "</td>";
                echo "<td>" . $row["contenido_materia"] . "</td>";
                echo "<td>";
                echo "<button class='btn btn-success btn-sm' onclick='editarMateria (" . $row["id_materia"] . ")'><i class='bi bi-pencil-fill'></i> Editar</button>";
                if($row['estado'] == 1 )
                echo "<button class='btn btn-danger btn-sm ms-2' onclick=\"location.href='deshabilitar.php?id=" . $row['id_materia'] . "'\"><i class='bi bi-x-circle-fill'></i> Deshabilitar</button>";
                                 
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


<!-- Modal -->
<div class="modal fade" id="agregarMateriaModal" tabindex="-1" aria-labelledby="agregarMateriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarMateriaModalLabel">Agregar Materia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para agregar una nueva materia -->
        <form action="guardar.php" method="POST" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="nombre" class="form-label">Materia</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <input type="text" class="form-control" id="contenido" name="contenido" required>
          </div>

          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editarMateriaModal" tabindex="-1" aria-labelledby="editarMateriaModaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarMateriaModalLabel">Editar Materias</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para editar una Materia -->
        <form action="guardar.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="id" class="form-label">Codigo Materia</label>
            <input type="text" class="form-control" id="id" name="id" onlyread>
          </div>
         <div class="mb-3">
            <label for="nombre" class="form-label">Materia</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <input type="text" class="form-control" id="contenido" name="contenido" required>
          </div>
          <div class="mb-3">

          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
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
function editarMateria(id) {
    // Realizar una solicitud AJAX para obtener los datos del Materia con el ID proporcionado
    $.ajax({
        url: 'obtener_materia.php', // Ruta al script PHP que obtiene los datos del Materia
        type: 'GET',
        data: { id: id },
        success: function(response) {
            // Llenar los campos del formulario en el modal con los datos recibidos
            var data = JSON.parse(response);
            $('#editarMateriaModal #id').val(data.id_materia);
            $('#editarMateriaModal #usuario').val(data.n_materia);
            $('#editarMateriaModal #nombre').val(data.contenido_materia);

            // Mostrar la ventana modal
            $('#editarMateriaModal').modal('show');
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