<?php
include("includes/header.php");

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['nombre-usuario'])) {
    // El usuario ha iniciado sesión, obtén y muestra la información
    $nombreUsuario = $_SESSION['nombre-usuario'];
    $correoUsuario = $_SESSION['email-usuario'];
} else {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header('Location: login.php'); 
    exit();
}
?>

<style>
    .user-profile {
        text-align: center;
        margin-top: 20px;
    }

    .user-profile img {
        max-width: 200px;
        border-radius: 50%;
    }
</style>
<div class="user-profile">
    <img src="images/default-user-image.png" alt="Imagen de perfil" style="max-width: 100%; width: 200px;">
    <h1><strong><?php echo $nombreUsuario; ?></strong></h1>
    <p><?php echo $correoUsuario; ?></p>
</div>

<?php include("includes/footer.php") ?>