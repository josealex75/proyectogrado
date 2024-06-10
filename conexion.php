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

// DB credentials.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_appnotas');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}