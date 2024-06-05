<?php 
session_start();
require conexion.php;
if(!empty($_POST['correo']) && !empty($_POST['contraseña'])){
    $records=$conn->prepare('SELECT id_usuario, correo, contrasena FROM usuarios WHERE correo=:correo')
    $records-> bindParam(':correo', $_POST['correo']);
    $records-> excecute();
    $result = $records->fetch(PDO::fetch_assoc);
    $messege = '';

    if(count($result) > 0 && password_verify($_POST['contrasena', $result['contrasena']])){
        $_SESSION['id_usuario'&& 'id_roll'] = $result['id'];
        header(locationn: /profesores)
    }
    else{
        $messege = 'Lo siento algo salio mal intentalo de nuevo'; 
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>loguin</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <seccion>
        <h2>Login</h2>
        <?php 
            if(!empty($messege)) :?>
          <p> <?= message ?> </p>
        <php endif;
        ?> 
        <form action="index.php">
            <label for="">correo</label>
            <input type="email" placeholder="correo" id="correo" autofocus>
            <label for="">contraseña</label>
            <input type="password" placeholder="contraseña" id="contrasena">
            <input type="submit" value="Ingresar">
        </form>
    </seccion>
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