<?php
// Verificar si se recibió el ID del registro
if(isset($_GET['id'])) {
    // Conectar a la base de datos (suponiendo que ya tienes un archivo de conexión)
    require '../conexion.php';
   
    // Escapar el ID para prevenir inyección SQL
    $id = $conn->real_escape_string($_GET['id']);

    // Consultar la base de datos para obtener los datos del registro con el ID proporcionado
    $sql = "SELECT * FROM periodos WHERE id_periodo = $id";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0) {
        // Obtener los datos del registro
        $row = $result->fetch_assoc();
        print($row)
        // Convertir los datos a formato JSON y devolverlos
        echo json_encode($row);
    } else {
        // Si no se encontró el registro, devolver un objeto JSON vacío
        echo json_encode(array());
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibió el ID del registro, devolver un objeto JSON vacío
    echo json_encode(array());
}
?>
