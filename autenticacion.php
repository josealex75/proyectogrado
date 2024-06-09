<?php
session_start();

require 'conexion.php';

// Se valida si se ha enviado información, con la función isset()

if (!isset($_POST['username'], $_POST['password'])) {

    // si no hay datos muestra error y re direccionar

    header('Location: index.php');
}

// evitar inyección sql

if ($stmt = $conexion->prepare('SELECT id_usuario, usuario,contrasena,correo_usuario FROM usuarios WHERE correo_usuario = ?')) {

    // parámetros de enlace de la cadena s

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
}


// acá se valida si lo ingresado coincide con la base de datos

$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id_usuario,$usuario,$contrasena,$correo_usuario);
    $stmt->fetch();

    // se confirma que la cuenta existe ahora validamos la contraseña

    if ($_POST['password'] === $contrasena && $_POST['username'] === $correo_usuario or $_POST['username'] === $usuario) {


        // la conexion sería exitosa, se crea la sesión



        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $usuario;
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['correo'] = $correo_usuario;

        header('Location: index.php');
    }
} else {

    // usuario incorrecto
    header('Location: index.html');
}

$stmt->close();