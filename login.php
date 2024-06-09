
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body> 
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="index.html">Inicio</a>
      </li>
      </ul>
  </div>
    <div class="login-container">
        <h2>Login</h2>
        <form action="autenticacion.php" method="post">
            <input type="email" id="correo" placeholder="Correo electrónico" required>
            <input type="password" id="contrasena" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>
        <p id="error-message" class="error-message"></p>
    </div>

    <script src="assets/js/script.js"></script>

    <!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  &copy; 2024 Gestión de Notas
</footer>

<!-- Bootstrap JS (dependencias Popper.js y jQuery) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
  <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/js/bootstrap/bootstrap.min.js"></script>
  <script src="assets/js/pace/pace.min.js"></script>
  <script src="assets/js/lobipanel/lobipanel.min.js"></script>
  <script src="assets/js/iscroll/iscroll.js"></script>
  <!-- ========== PAGE JS FILES ========== -->
  <!-- ========== THEME JS ========== -->
  <script src="assets/js/main.js"></script>
  <script>
      $(function() {

      });
   </script>
</body>
</html>