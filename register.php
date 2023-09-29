<?php
// Recupera los datos del formulario POST
$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->email) && isset($data->password)) {
    $nombre = $data->username;
    $email = $data->email;
    $password = $data->password;

    // Conecta a la base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "jj_store";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Verifica si hubo un error en la conexión a la base de datos
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Realiza una consulta para verificar si el correo ya existe en la base de datos
    $sql = "SELECT * FROM users WHERE uCorreo = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // El correo no está registrado, procede a registrar al usuario
        $sql_insert = "INSERT INTO users (uNombre, uCorreo, uPassword) VALUES ('$nombre', '$email', '$password')";
        if ($conn->query($sql_insert) === TRUE) {
            // El registro fue exitoso, envía una respuesta JSON de éxito
            echo json_encode(["success" => true]);
        } else {
            // Hubo un error en el registro, envía una respuesta JSON de error
            echo json_encode(["success" => false, "message" => "Error en el registro: " . $conn->error]);
        }
    } else {
        // El correo ya está registrado, envía una respuesta JSON de error
        echo json_encode(["success" => false, "message" => "El correo ya está registrado"]);
    }

    $conn->close();
} else {
    // Si no se proporcionan datos válidos, envía una respuesta JSON de error
    echo json_encode(["success" => false, "message" => "Datos de entrada no válidos"]);
}
?>
