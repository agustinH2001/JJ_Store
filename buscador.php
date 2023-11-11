<?php include("includes/header.php") ?>
<?php include("db.php") ?>

<?php
// Verifica si se proporciona la categoría en la URL
if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];

    // Define un array asociativo para mapear valores de categoría a nombres
    $categorias = [
        1 => 'Periféricos',
        2 => 'Pantallas',
        3 => 'Cables/Adaptadores',
        4 => 'Componentes de PC',
    ];

    // Verifica si el valor de la categoría existe en el array
    if (array_key_exists($categoria, $categorias)) {
        $nombreCategoria = $categorias[$categoria];

        // Ajusta la consulta según estructura de base de datos y necesidades
        $query = "SELECT * FROM productos WHERE productoCat = $categoria";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<div style='width: 80%; padding-left: 20%;'>";
            echo "<div class='card'>";
            echo "<div class='card-header'>";
            echo "<h3 class='card-title'><b>Productos en categoría $nombreCategoria</b></h3>";
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

            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "No se encontraron productos en la categoría: $nombreCategoria.";
        }
    } else {
        echo "Categoría no válida.";
    }
} else {
    exit();
}
?>

<?php include("includes/footer.php") ?>