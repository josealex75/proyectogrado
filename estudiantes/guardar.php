<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el campo obligatorio "nombre"
    if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
        // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
        require '../conexion.php';

        // Recuperar el campo obligatorio "nombre"
        $documento = $_POST["documento"];

        // Recuperar los campos opcionales si están presentes
        $documento = isset($_POST["id"]) ? $_POST["id"] : '';
        $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : '';
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
        $apellido = isset($_POST["apellidos"]) ? $_POST["apellidos"] : '';
        $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : '';
        $id_rol = "0";
        $foto = '';

       
        // Insertar los datos en la base de datos
        
        $sql = "INSERT INTO usuarios (id_usuario, usuario, n_usuario, a_usuario, correo_usuario, direccion, telefono, id_rol, foto) 
                    VALUES ('$documento', '$usuario', '$nombre', '$apellido', '$email', '$direccion', '$telefono', '$id_rol', '$foto')";
       
        if ($conn->query($sql) === TRUE) {
            // Redirigir al usuario al index con un mensaje de éxito
            header("location: index.php");
            exit();
        } else {
            echo "Error al insertar los datos: " . $conn->error;
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "El campo 'nombre' es obligatorio";
    }
} else {
    echo "Acceso denegado";
}
?>
