<?php

include("../db.php");

if(isset($_POST["save_producto"])){
    $productoNombre = $_POST["producto"];
    $productoDesc = $_POST["descripcion"];
    $productoStock = $_POST["stock"];
    $productoPrecio = $_POST["precio"];
    $productoURL = $_POST["URL"];
    $productoCat = $_POST["categoria"];

    $query = "INSERT INTO productos(productoNombre,productoDesc,productoStock,productoPrecio,productoURL,productoCat) VALUES 
    ('$productoNombre','$productoDesc','$productoStock','$productoPrecio','$productoURL','$productoCat')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("FAILED");
    }

    $_SESSION["message"] = "Producto añadido con éxito";
    $_SESSION["message_type"] = "success";

    header("Location: ../crud.php");
}

?>
