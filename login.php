<?php
// Recupera los datos del formulario POST
$data = json_decode(file_get_contents("php://input"));

if (isset($data->email) && isset($data->password)) {
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

    // Realiza una consulta para verificar las credenciales del usuario
    $sql = "SELECT * FROM users WHERE uCorreo = '$email' AND uPassword = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows != 0) {
        // Las credenciales son válidas, envía una respuesta JSON de éxito
		
		 //inicio el proceso de session 
		 //por las dudas elimino alguna sesion activa
		if (session_status() == PHP_SESSION_ACTIVE) {
			// Hay una sesión activa, destrúyela
			session_unset();   // Limpia todas las variables de sesión
			session_destroy(); // Destruye la sesión
		}
		session_start();
		$row = $result->fetch_assoc();
    
		$_SESSION["nombre-usuario"] = $row["uNombre"];
		$_SESSION["email-usuario"] = $row["uCorreo"];
		
		
        echo json_encode(["success" => true]);
    } else {
        // Las credenciales son incorrectas, envía una respuesta JSON de error
        echo json_encode(["success" => false, "message" => "Datos incorrectos o inexistentes."]);
    }

    $conn->close();
} else {
    // Si no se proporcionan datos válidos, envía una respuesta JSON de error
    echo json_encode(["success" => false, "message" => "Datos de entrada no válidos"]);
}
?>
