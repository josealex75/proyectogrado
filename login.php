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
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form">
            <input type="email" id="correo" placeholder="Correo electrónico" required>
            <input type="password" id="contrasena" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>
        <p id="error-message" class="error-message"></p>
    </div>

    <script src="script.js"></script>

    <!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  &copy; 2024 Gestión de Notas
</footer>

<!-- Bootstrap JS (dependencias Popper.js y jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="assets/js/index.js"></script>
</body>
</html>