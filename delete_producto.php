<?php

    include("db.php");

    if(isset($_GET['productoID'])) {
        $id = $_GET['productoID'];
        $query = "DELETE FROM productos WHERE productoID = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("FAILED");
        }

        $_SESSION["message"] = "Producto eliminado con éxito";
        $_SESSION["message_type"] = "danger";
        header("Location: crud.php");
    }

?>