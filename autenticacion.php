<?php
session_start();

//credenciales de acceso a la base datos

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'db_appnotas';

// conexion a la base de datos

$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {

    // si se encuentra error en la conexión

    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

// Se valida si se ha enviado información, con la función isset()

if (!isset($_POST['username'], $_POST['password'])) {

    // si no hay datos muestra error y re direccionar

    header('Location: index.php');
}

// evitar inyección sql

if ($stmt = $conexion->prepare('SELECT id_usuario, usuario,contrasena,correo_usuario,id_rol,estado FROM usuarios WHERE correo_usuario = ?')) {

    // parámetros de enlace de la cadena s

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
}


// acá se valida si lo ingresado coincide con la base de datos

$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($id_usuario,$usuario,$contrasena,$correo_usuario,$id_rol,$estado);
    $stmt->fetch();

    // se confirma que la cuenta existe ahora validamos la contraseña

    if ($_POST['password'] === $contrasena && $_POST['username'] === $correo_usuario ) {

        // la conexion sería exitosa, se crea la sesión

        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $usuario;
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['correo'] = $correo_usuario;
        $_SESSION['roll'] = $id_rol;
        $_SESSION['estado'] = $estado;

        header('Location: index.php');
    }
    else {

    // usuario incorrecto
    header('Location: index.html');
    }
}
$stmt->close();
