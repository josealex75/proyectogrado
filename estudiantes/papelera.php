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
          <a class="nav-link" href="../profesores">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../materias">Materias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Estudiantes</a>
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
  <!-- Sección de Gestión de Estudiantes -->
  <section id="estudiantes">
    <h2>Gestión de Estudiantes (Papelera)</h2>
    <div class="row">
      <div class="col-12">
        <a href="index.php" class="btn btn-primary mb-3 ms-3 float-end">
          <i class="bi bi-trash"></i> Estudiantes
        </a>
        
      </div>
    </div>

    <hr>

    <?php
        require '../conexion.php';

        $sql = "SELECT * FROM usuarios WHERE id_rol = 2 && estado = 0";
        $result = $conn->query($sql);
    
    // // Verificar si se encontraron resultados
        if ($result->num_rows > 0) {
    
    ?>

    <!-- Tabla de profesores -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Foto</th>
            <th>Documento</th>
            <th>Usuario</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
               // Iterar sobre los resultados y mostrar los datos en la tabla
               while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='" . $row["foto"] . "' alt='Foto' width='50'></td>";
                echo "<td>" . $row["id_usuario"] . "</td>";
                echo "<td>" . $row["usuario"] . "</td>";
                echo "<td>" . $row["n_usuario"] . "</td>";
                echo "<td>" . $row["a_usuario"] . "</td>";
                echo "<td>" . $row["correo_usuario"] . "</td>";
                echo "<td>" . $row["direccion"] . "</td>";
                echo "<td>" . $row["telefono"] . "</td>";
                echo "<td>";
                echo "<button class='btn btn-success btn-sm' onclick='habilitarProfesor (" . $row["id_usuario"] . ")'><i class='bi bi-pencil-fill'></i> Habilitar</button>";
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


<!-- Modal -->
<div class="modal fade" id="agregarProfesorModal" tabindex="-1" aria-labelledby="agregarProfesorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarProfesorModalLabel">Agregar Profesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para agregar un nuevo profesor -->
        <form action="guardar.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="documento" class="form-label">Numero Documento</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
          </div>
          <div class="mb-3">
            <label for="usuario" class="form-label">usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" >
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Direccion residencia</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono Movil</label>
            <input type="tel" class="form-control" id="telefono" name="telefono">
          </div> <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editarProfesorModal" tabindex="-1" aria-labelledby="editarProfesorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarProfesorModalLabel">Editar Profesor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para editar un profesor -->
        <form action="editar.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="documento" class="form-label">Numero Documento</label>
            <input type="text" class="form-control" id="documento" name="documento" >
          </div>
          <div class="mb-3">
            <label for="usuario" class="form-label">usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" >
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombre" name="nombre" >
          </div>
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" >
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" >
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Direccion residencia</label>
            <input type="text" class="form-control" id="direccion" name="direccion" >
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono Movil</label>
            <input type="tel" class="form-control" id="telefono" name="telefono">
          </div> <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<img id="preview" src="#" alt="Preview" style="display:none; max-width: 100%; max-height: 200px;">
<script>
    function mostrarImagenPreview(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imagen = document.getElementById('preview');
            imagen.src = reader.result;
            imagen.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>




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
function habilitarProfesor(id) {
    // Realizar una solicitud AJAX para obtener los datos del profesor con el ID proporcionado
    $.ajax({
        url: 'habilitar.php', // Ruta al script PHP que obtiene los datos del profesor
        type: 'GET',
        data: { id: id },
        success: function(response) {
          alert('Profesor habilitado!');
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