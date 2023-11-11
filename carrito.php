<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Obtiene el carrito actual desde sessionStorage
        let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

        // Verifica si el carrito tiene elementos
        if (cart.length > 0) {
            // Recorre los elementos del carrito y realiza acciones según sea necesario
            cart.forEach(item => {
                // Mostrar producto en carrito
                console.log('Producto en el carrito:', item);
            });
        } else {
            console.log('El carrito está vacío.');
        }
    });
</script>

<?php 
include("includes/header.php"); 
// Obtiene el carrito actual desde la sesión y decodifica el JSON
$cart = isset($_SESSION['cart']) ? json_decode($_SESSION['cart'], true) : [];
?>

<!-- Contenido del carrito -->
<div class="container">
    <h2>Carrito de Compras</h2>

    <?php

    if (!empty($cart)) {
        // Itera sobre los elementos del carrito y muestra la información
        foreach ($cart as $item) {
            echo '<div class="product">';
            echo '<p><strong>ID:</strong> ' . $item['id'] . '</p>';
            echo '<p><strong>Nombre:</strong> ' . $item['nombre'] . '</p>';
            echo '<p><strong>Precio:</strong> $' . $item['precio'] . '</p>';
            echo '<p><strong>Cantidad:</strong> ' . $item['quantity'] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>

</div>

<?php include("includes/footer.php"); ?>