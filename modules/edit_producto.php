<?php
    include("../db.php");

    if(isset($_GET['productoID'])) {
        $id = $_GET['productoID'];
        $query = "SELECT * FROM productos WHERE productoID = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $id = $row["productoID"];
            $nombre = $row["productoNombre"];
            $desc = $row["productoDesc"];
            $stock = $row["productoStock"];
            $precio = $row["productoPrecio"];
            $url = $row["productoURL"];
            $cat = $row["productoCat"];
        }
    }

    if(isset($_POST["update"])){
        $id = $_GET["productoID"];
        $nombre = $_POST["producto"];
        $desc = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $url = $_POST["URL"];
        $cat= $_POST["categoria"];

        $query = "UPDATE productos set productoNombre='$nombre',productoDesc='$desc',productoStock='$stock',productoPrecio='$precio',productoURL='$url',productoCat='$cat' WHERE productoID=$id";
        mysqli_query($conn, $query);
        header("Location: ../crud.php");
    }
?>

<?php include("../includes/header.php") ?>
<style>
h1 {text-align: center;}
</style>
<p></p>
<h1>Editando producto ID: <?php echo $id?></h1>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">  
                <div class="card card-body">
                    <form action="edit_producto.php?productoID=<?php echo $_GET['productoID']?>" method="POST">
                        <div class="form-group">
                            <b>Nombre producto:</b><input type="text" name="producto" value="<?php echo $nombre?>" class="form-control">
                        </div>
                        <p></p>
                        <div class="form-group">
                            <b>Descripción:</b><textarea name="descripcion" rows="5" class="form-control"><?php echo $desc?></textarea>
                        </div>
                        <p></p>
                        <div class="form-group">
                            <b>Stock:</b><input type="text" name="stock" class="form-control" value="<?php echo $stock?>">
                        </div>
                        <p></p>
                        <div class="form-group">
                            <b>Precio:</b><input type="text" name="precio" class="form-control" value="<?php echo $precio?>">
                        </div>
                        <p></p>
                        <div class="form-group">
                            <b>URL imagen:</b><input type="text" name="URL" class="form-control" value="<?php echo $url?>">
                        </div>
                        <p></p>
                        <div class="form-group">
                        <b>Categoria:</b><select name="categoria" class="form-control">
                            <option value="1">Periférico</option>
                            <option value="2">Monitor o pantalla</option>
                            <option value="3">Cable o adaptador</option>
                            <option value="4">Componente PC</option>
                        </select>
                        </div>
                        <p></p>
                        <input type="submit" class="btn btn-success btn-block" name="update" value="Guardar cambios"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("../includes/footer.php") ?>