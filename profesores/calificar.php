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
<!-- Main Content -->
<div class="container mt-4">
  <!-- Sección de Gestión de Grados -->
  <section id="Grados">
    <h2>Gestión de Grados</h2>
    <!-- Add a dropdown to select a student -->
    <div class="row mb-3">
      <div class="col-12">
        <label for="studentSelect" class="form-label">Seleccione un Estudiante:</label>
        <select class="form-select" id="studentSelect">
          <!-- Populate this dropdown with the list of students -->
          <?php
            require '../conexion.php';
            $sql = "SELECT * FROM usuarios WHERE id_rol=2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id_estudiante"] . "'>" . $row["n_estudiante"] . "</option>";
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
        <p><strong>ID:</strong> <span id="id_estudiante"></span></p>
        <p><strong>Nombre:</strong> <span id="n_estudiante"></span></p>
        <!-- Add more fields as needed -->
      </div>
    </div>

    <!-- Rest of your code -->
  </section>
</div>

<script>
// JavaScript to handle the selection event and retrieve student information
document.getElementById("studentSelect").addEventListener("change", function() {
  var id_estudiante = this.value;
  // AJAX request to retrieve student information based on the selected ID
  $.ajax({
    url: '../estudiantes/obtener_estudiante.php', // Change the URL to your PHP script that retrieves student information
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
</body>
</html>