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
          <a class="nav-link" href="../notas">Notas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Main Content -->
<div class="container mt-4">
  <!-- Sección de Gestión de estudiante -->
  <section id="estudiantes">
    <h2>Gestión de Grados</h2>
    <!-- Add a dropdown to select a student -->
    <div class="row mb-3">
      <div class="col-12">
        <label for="studentSelect" class="form-label">Seleccione un Estudiante:</label>
        <select class="form-select" id="studentSelect">
          <!-- Populate this dropdown with the list of students -->
          <?php
            require '../conexion.php';
            $sql = "SELECT * FROM estudiantes";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id_estudiante"] . "'>" . $row["nombre"] . "</option>";
              }
            }
          ?>
        </select>
      </div>
    </div>

    <!-- Display selected student's information -->
    <div id="studentInfo" class="row mb-3">
      <div class="col-12">
        <h4>Información del Estudiante:</h4>
        <p><strong>ID:</strong> <span id="studentId"></span></p>
        <p><strong>Nombre:</strong> <span id="studentName"></span></p>
        <!-- Add more fields as needed -->
      </div>
    </div>

    <!-- Rest of your code -->
  </section>
</div>

<script>
// JavaScript to handle the selection event and retrieve student information
document.getElementById("studentSelect").addEventListener("change", function() {
  var studentId = this.value;
  // AJAX request to retrieve student information based on the selected ID
  $.ajax({
    url: 'obtener_estudiante.php', // Change the URL to your PHP script that retrieves student information
    type: 'GET',
    data: { id: studentId },
    success: function(response) {
      var data = JSON.parse(response);
      // Display student information
      document.getElementById("studentId").innerText = data.id_estudiante;
      document.getElementById("studentName").innerText = data.n_estudiante;
      // Update other fields as needed
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
});
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