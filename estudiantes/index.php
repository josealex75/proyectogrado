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
          <a class="nav-link active" href="index.php">Estudiantes</a>
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
  <!-- Sección de Gestión de Estudiantes -->
  <section id="profesores">
    <h2>Gestión de Estudiantes</h2>
    <div class="row">
      <div class="col-12">
        <a href="papelera.php" class="btn btn-warning mb-3 ms-3 float-end">
          <i class="bi bi-trash"></i> Papelera
        </a>
        <!-- Botón para agregar nuevo Estudiantes -->
        <button class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#agregarEstudianteModal">
          <i class="bi bi-plus"></i> Agregar Estudiantes
        </button>
        
      </div>
    </div>

    <hr>

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
             require '../conexion.php';

             $sql = "SELECT * FROM usuarios WHERE id_rol = 2 && estado = 1";
             $result = $conn->query($sql);
            
            // // Verificar si se encontraron resultados
             if ($result->num_rows > 0) {
            //   // Iterar sobre los resultados y mostrar los datos en la tabla
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
                echo "<button class='btn btn-success btn-sm' onclick='editarEstudiante (" . $row["id_usuario"] . ")'><i class='bi bi-pencil-fill'></i> Editar</button>";
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


<!-- Modal -->
<div class="modal fade" id="agregarEstudianteModal" tabindex="-1" aria-labelledby="agregarEstudianteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarEstudianteModalLabel">Agregar Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para agregar un nuevo Estudiante -->
        <form action="guardar.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="id" class="form-label">Numero Documento</label>
            <input type="text" class="form-control" id="id" name="id" required;readonly>
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
<div class="modal fade" id="editarEstudianteModal" tabindex="-1" aria-labelledby="editarEstudianteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarEstudianteModalLabel">Editar Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para editar un Estudiante -->
        <form action="editar.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="id" class="form-label disable">Numero Documento</label>
            <input type="text" class="form-control" id="id" name="id" readonly>
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
function editarEstudiante(id) {
    // Realizar una solicitud AJAX para obtener los datos del profesor con el ID proporcionado
    $.ajax({
        url: 'obtener_Estudiante.php', // Ruta al script PHP que obtiene los datos del profesor
        type: 'GET',
        data: { id: id },
        success: function(response) {
            // Llenar los campos del formulario en el modal con los datos recibidos
            var data = JSON.parse(response);
            $('#editarEstudianteModal #id').val(data.id_usuario);
            $('#editarEstudianteModal #usuario').val(data.usuario);
            $('#editarEstudianteModal #nombre').val(data.n_usuario);
            $('#editarEstudianteModal #apellidos').val(data.a_usuario);
            $('#editarEstudianteModal #email').val(data.correo_usuario);
            $('#editarEstudianteModal #direccion').val(data.direccion);
            $('#editarEstudianteModal #telefono').val(data.telefono);
            // Mostrar la ventana modal
            $('#editarEstudianteModal').modal('show');
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