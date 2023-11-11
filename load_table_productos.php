<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jj_store";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT * FROM productos ORDER BY productoID DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div style='width: 80%; padding-left: 20%;'>";
    echo "<div class='card'>";
    echo "<div class='card-header'>";
    echo "<h3 class='card-title'><b>N O V E D A D E S</b></h3>";
    echo "</div>";
    echo "<div class='card-body p-0'>";
    echo "<ul class='products-list product-list-in-card pl-2 pr-2'>";

    while ($row = $result->fetch_assoc()) {
        echo "<li class='item'>";
        echo "<div class='product-img'>";
        echo "<img src='" . $row["productoURL"] . "' alt='Product Image' class='img-size-50'>";
        echo "</div>";
        echo "<div class='product-info'>";
        echo "<a href='show_producto.php?id=" . $row["productoID"] . "' class='product-title'>" . $row["productoNombre"] . "<span class='badge badge-warning float-right'>$" . $row["productoPrecio"] . "</span></a>";
        echo "<span class='product-description'>" . $row["productoDesc"] . "</span>";
        echo "</div>";
        echo "</li>";
    }
} else {
    echo "No se encontraron registros.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
