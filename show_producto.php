<?php
include("db.php");
include("includes/header.php");

if (isset($_GET["id"])) {
    $productoID = $_GET["id"];
    $query = "SELECT * FROM productos WHERE productoID = $productoID";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row["productoID"];
        $nombre = $row["productoNombre"];
        $desc = $row["productoDesc"];
        $stock = $row["productoStock"];
        $precio = $row["productoPrecio"];
        $url = $row["productoURL"];
        $cat = $row["productoCat"];
    } else {
        echo "Producto no encontrado";
    }
} else {
    echo "ID de producto no proporcionada";
}
?>

<style>
    h1 { text-align: center; }
    .product-details {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        text-align: center;
    }
    .product-description {
        font-size: 18px;
        margin-top: 10px;
    }
    .product-info {
        margin: 20px 0;
        text-align: center;
    }
</style>

<div class="product-details">
    <h1><?php echo $nombre ?></h1>
    <div class="product-info">
        <p><strong>Descripción:</strong></p>
        <p class="product-description"><?php echo $desc ?></p>
    </div>
    <div class="product-info">
        <p><strong>Precio:</strong> $<?php echo $precio ?></p>
    </div>
    <div class="product-info">
        <p><strong>Imagen del Producto:</strong></p>
        <img src="<?php echo $url ?>" alt="Producto" style="max-width: 100%; width: 400px;">
    </div>
    <div class="product-info">
        <button type="button" class="btn btn-success" onclick="addToCart(<?php echo $id; ?>, '<?php echo $nombre; ?>', <?php echo $precio; ?>)"> Añadir a Carrito</button>
    </div>
</div>

<?php include("includes/footer.php") ?>

<script>
    function addToCart(id, nombre, precio) {
        // Verificar si el usuario ha iniciado sesión
        <?php if (isset($_SESSION["nombre-usuario"])) { ?>
            // Obtiene el carrito actual desde sessionStorage
            let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
            // Verifica si el producto ya está en el carrito
            let existingProduct = cart.find(item => item.id === id);
            if (existingProduct) {
            // Si el producto ya está en el carrito, incrementa la cantidad
                existingProduct.quantity += 1;
            } else {
            // Si el producto no está en el carrito, añádelo
                cart.push({
                id: id,
                nombre: nombre,
                precio: precio,
                quantity: 1
            });
            }
            // Guarda el carrito actualizado en sessionStorage
            sessionStorage.setItem('cart', JSON.stringify(cart));
            console.log('Carrito actualizado en sessionStorage:', sessionStorage.getItem('cart'));
            // Mostrar un mensaje
            alert('Producto añadido al carrito: ' + nombre + ' - Precio: $' + precio);
        <?php } else { ?>
            // Mostrar mensaje si el usuario no ha iniciado sesión
            alert('Por favor, inicie sesión para añadir productos al carrito.');
        <?php } ?>
        }
</script>
