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
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
  <!-- Sección de Gestión de Profesores -->
  <section id="profesores">
    <h2>Gestión de Profesores</h2>
    <div class="row">
    </div>

    <hr>

    <!-- Tabla de profesores -->
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Materia</th>
            <th>Grados</th>
          </tr>
        </thead>
        <tbody>
    <?php

    require '../conexion.php'; // Assuming this file includes your database connection
    
    // Checking if user is logged in
    if (!isset($_SESSION['id_usuario'])) {
           
    }

    $_userid = $_SESSION['id_usuario']; // Getting user ID from session

    $sql = "SELECT DISTINCT g.id_grado,m.n_materia, g.n_grado, u.n_usuario FROM materias m INNER JOIN usuarios u  
    INNER JOIN grados g ON m.id_usuario = u.id_usuario AND m.id_grado = g.id_grado WHERE
    u.id_rol = 0 AND u.id_usuario = :userid";

    $query = $dbh->prepare($sql);
    $query->bindParam(':userid', $_userid, PDO::PARAM_INT); // Binding user ID parameter
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

      if (count($results) > 0) {
      
        foreach ($results as $row) {

            echo "<tr>";
            echo "<td>" . $row->n_materia . "</td>";
            echo "<td>" . $row->n_grado . "</td>";
            echo "<td>";
            echo "<button class='btn btn-success btn-sm' onclick=\" location.href='obtener_calificar.php?id=" . $row->n_materia . "'\"><i class='bi bi-x-circle-fill'></i> Editar</button>";

            echo"</td>";
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
function editarProfesor(id) {
    // Realizar una solicitud AJAX para obtener los datos del profesor con el ID proporcionado
    $.ajax({
        url: 'obtener_calificar.php', // Ruta al script PHP que obtiene los datos del profesor
        type: 'GET',
        data: { id: id },
        success: function(response) {
            // Llenar los campos del formulario en el modal con los datos recibidos
            var data = JSON.parse(response);
            $('#editarProfesorModal #materia').val(data.n_materia);
            $('#editarProfesorModal #id').val(data.id_usuario);
            $('#editarProfesorModal #nombre').val(data.n_usuario);
            $('#editarProfesorModal #apellidos').val(data.n_grado);
  
            // Mostrar la ventana modal
            $('#editarProfesorModal').modal('show');
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