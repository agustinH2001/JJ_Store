<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JJ Store</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="./login_interface.php"><b>Registro</b></a>
  </div>
  <div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">Ingrese sus datos</p>

    <form id="loginForm">
        <div class="input-group mb-3">
            <input type="username" name="username" class="form-control" placeholder="Nombre usuario">
                <div class="input-group-append">
                    <div class="input-group-text">
                </div>
            </div>
        </div>
      <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Contraseña">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Registro</button>
        </div>
      </div>
    </form>
    <p class="mb-0">
      <span class="text-center">Ya tiene cuenta?</span>
      <a href="login_interface.php" class="text-center">Ingresar</a>
    </p>
  </div>
</div>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>



<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      var email = $("input[name='email']").val();
      var password = $("input[name='password']").val();
      var username = $("input[name='username']").val();

      // Realizar una solicitud fetch a logeo.php
      fetch("register.php", {
        method: "POST",
        body: JSON.stringify({ email: email, password: password, username: username }),
        headers: {
          "Content-Type": "application/json",
        },
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            // Si la autenticación es exitosa, redirige al usuario
            window.location.href = "http://localhost/JJ_Store/login_interface.php";
          } else {
            alert("Error de autenticación. Verifique sus credenciales. " + data.success + " ---- " + data.message);
          }
        })
        .catch((error) => {
          console.error("Error en la solicitud fetch:", error);
        });
    },
  });

  $('#loginForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5,
      },
    },
    messages: {
      email: {
        required: "Por favor ingrese su correo",
        email: "Por favor ingrese un correo válido",
      },
      password: {
        required: "Por favor ingrese su contraseña",
        minlength: "La contraseña debe tener al menos 5 caracteres",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

</script>
</body>
</html>

