<?php
  // Configuración de la conexión a la base de datos
  $servername = "localhost"; // Nombre del servidor
  $username = "root"; // Nombre de usuario de la base de datos
  $password = ""; // Contraseña de la base de datos
  $database = "db_appnotas"; // Nombre de la base de datos

  // Crear conexión
  $conn = new mysqli($servername, $username, $password, $database);

  // Verificar la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }