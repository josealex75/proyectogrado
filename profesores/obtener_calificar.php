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
    g.n_grado 
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
                echo "<td>";
                echo "<button class='btn btn-success btn-sm' onclick='editarNota (" . $row["id_usuario"] . ")'><i class='bi bi-pencil-fill'></i> Editar</button>";
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
