<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <b>Nuevo producto:</b>
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION["message"])) { ?>
                <div class="alert alert-<?= $_SESSION["message_type"]?>" role="alert">
                    <?= $_SESSION["message"]?>
                </div>
                <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_producto.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="producto" class="form-control" placeholder="Nombre del producto" autofocus>
                    </div>
                    <p></p>
                    <div class="form-group">
                        <textarea name="descripcion" rows="5" class="form-control" placeholder="Descripción del producto"></textarea>
                    </div>
                    <p></p>
                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="Stock inicial">
                    </div>
                    <p></p>
                    <div class="form-group">
                        <input type="text" name="precio" class="form-control" placeholder="Precio">
                    </div>
                    <p></p>
                    <div class="form-group">
                        <input type="text" name="URL" class="form-control" placeholder="URL imagen del producto">
                    </div>
                    <p></p>
                    <div class="form-group">
                        <select name="categoria" class="form-control">
                            <option selected>Categoría del producto</option>
                            <option value="1">Periférico</option>
                            <option value="2">Monitor o pantalla</option>
                            <option value="3">Cable o adaptador</option>
                            <option value="4">Componente PC</option>
                        </select>
                    </div>
                    <p></p>
                    <input type="submit" class="btn btn-success btn-block" name="save_producto" value="Añadir producto"></input>
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <b>Productos existentes:</b>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>URL</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT * FROM productos";
                        $result_productos = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_productos)){ ?>
                            <tr>
                                <td><?php echo $row["productoID"] ?></td>
                                <td><?php echo $row["productoNombre"] ?></td>
                                <td><?php echo $row["productoStock"] ?></td>
                                <td><?php echo $row["productoURL"] ?></td>
                                <td><?php echo $row["productoCat"] ?></td>
                                <td>
                                    <a href="edit_producto.php?productoID=<?php echo $row['productoID']?>">(Editar)</a>
                                    <a href="delete_producto.php?productoID=<?php echo $row['productoID']?>">(Eliminar)</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>    
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const productoInput = document.querySelector('input[name="producto"]');
        const descripcionTextarea = document.querySelector('textarea[name="descripcion"]');
        const stockInput = document.querySelector('input[name="stock"]');
        const precioInput = document.querySelector('input[name="precio"]');
        const categoriaSelect = document.querySelector('select[name="categoria"]');

        form.addEventListener("submit", function (event) {
            let isValid = true;

            
            // Validar que el campo "producto" no esté vacío
            if (productoInput.value.trim() === "") {
                alert("Por favor, ingrese un nombre de producto.");
                productoInput.focus();
                isValid = false;
            }

            if (isValid != false) {
				// Validar que el campo "descripcion" no esté vacío
				if (descripcionTextarea.value.trim() === "") {
					alert("Por favor, ingrese una descripción del producto.");
					descripcionTextarea.focus();
					isValid = false;
				}
			}

            if (isValid != false) {
				// Validar que el campo "stock" sea un número válido
				if (isNaN(stockInput.value) || stockInput.value <= 0) {
					alert("Por favor, ingrese un valor válido para el stock.");
					stockInput.focus();
					isValid = false;
				}
			}

			if (isValid != false) {
				// Validar que el campo "precio" sea un número válido
				if (isNaN(precioInput.value) || precioInput.value <= 0) {
					alert("Por favor, ingrese un valor válido para el precio.");
					precioInput.focus();
					isValid = false;
				}
			}

			if (isValid != false) {
				
				// Validar que se haya seleccionado una categoría
				if (categoriaSelect.value === "Categoría del producto") {
					alert("Por favor, seleccione una categoría del producto.");
					categoriaSelect.focus();
					isValid = false;
				}
			}

            if (!isValid) {
                event.preventDefault(); // Evitar que el formulario se envíe si no es válido
            }
        });
    });
</script>

