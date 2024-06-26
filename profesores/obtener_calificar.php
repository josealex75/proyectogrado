<?php


// confirmar sesion

session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}
require '../conexion.php';
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

<!-- Navbar 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Gestión de Notas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Profesores</a>
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
          <a class="nav-link" href="../notas">Notas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>-->

<!-- Main Content -->
<div class="container mt-4">
  <!-- Sección de Gestión de Profesores -->
  <section id="profesores">
    <h2>Gestiónar Calificaciones</h2>
    <div class="row">
      <div class="col-12">
        <!-- Botón para agregar nuevo profesor -->
        <button class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="">
          <i class="bi bi-plus"></i> Volver
        </button>
        
      </div>
    </div>

    <hr>

    <!-- Tabla de profesores -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Materia</th>
            <th>Documento</th>
            <th>Usuario</th>
            <th>Nombres</th>
            <th>Grado</th>
            <th>nota</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
             
// Verificar si se recibió el ID del registro
    if(isset($_GET['id'])) {
   
    // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)


    // Escapar el ID para prevenir inyección SQL
    $id = $conn->real_escape_string($_GET['id']);
    
}
    $sql="SELECT DISTINCT 
    m.n_materia, 
    u.id_usuario, 
    u.usuario, 
    u.n_usuario, 
    n.nota, 
    g.n_grado,
    g.id_grado
FROM 
    usuarios u 
INNER JOIN 
    materias m ON u.id_usuario = m.id_usuario 
INNER JOIN 
    grados g ON g.id_grado = m.id_grado 
LEFT JOIN 
    notas n ON u.id_usuario = n.id_usuario AND m.id_materia = n.id_materia  
WHERE 
    m.n_materia = '$id' 
    AND u.id_rol = 1";

             $result = $conn->query($sql);

            // // Verificar si se encontraron resultados
             if ($result->num_rows > 0) {
            //   // Iterar sobre los resultados y mostrar los datos en la tabla
               while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["n_materia"] . "</td>";
                echo "<td>" . $row["id_usuario"] . "</td>";
                echo "<td>" . $row["usuario"] . "</td>";
                echo "<td>" . $row["n_usuario"] . "</td>";
                echo "<td>" . $row["n_grado"] . "</td>";
                echo "<td>" . $row["nota"] . "</td>";
                echo '<pre>';
                print_r($row);
                echo '</pre>';
                echo "<td>";
                echo "<button class='btn btn-success btn-sm' onclick='editarNota (" .$row["id_usuario"]. ")'><i class='bi bi-pencil-fill'></i> Editar</button>";
                echo '<pre>';
                print_r($row["id_usuario"]);
                echo '</pre>';
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
<div class="modal fade" id="editarNotaModal" tabindex="-1" aria-labelledby="editarNotaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarNotaModalLabel">Calificar Nota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario para editar nota -->
        <form action="editarnotas.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="materia" class="form-label disable">Materia</label>
            <input type="text" class="form-control" id="materia" name="materia" readonly>
          </div>
          <div class="mb-3">
            <label for="id" class="form-label">Documnto</label>
            <input type="text" class="form-control" id="id" name="id" readonly>
          </div>
          <div class="mb-3">
            <label for="grado" class="form-label">Grado</label>
            <input type="text" class="form-control" id="grado" name="grado" readonly>
          </div>
          <div class="mb-3">
            <label for="nota" class="form-label">nota</label>
            <input type="text" class="form-control" id="nota" name="nota" >
          </div>
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
function editarNota(id) {
    // Realizar una solicitud AJAX para obtener los datos del alumno con el ID proporcionado
    $.ajax({
        url: 'calificarnotas.php', // Ruta al script PHP que obtiene los datos del alumno
        type: 'GET',
        data: { id: id },
        success: function(response) {
            // Llenar los campos del formulario en el modal con los datos recibidos
            var data = JSON.parse(response);
            $('#editarNotaModal #id').val(data.id_usuario);
            $('#editarNotaModal #materia').val(data.materia);
            $('#editarNotaModal #grado').val(data.id_grado);
            $('#editarNotaModal #nota').val(data.nota);
            // Mostrar la ventana modal
            $('#editarNotaModal').modal('show');
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

