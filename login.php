<?php
require_once('funciones.php');

$correoElectronico = "";

if (count($_POST)) {

    // Variable para persistir la información del usuario

    $correoElectronico = trim($_POST['email']);
    $contrasenia = $_POST["password"];

    // Esta función guarda el array que retorna la función validarRegistro()
    $erroresEnLogin = loginCall();
}

if (isset($_COOKIE['UsuarioLogueado'])) {
    $correoElectronico = $_COOKIE['UsuarioLogueado'];
}

?>


<!doctype html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Source+Sans+Pro&display=swap" rel="stylesheet">
  <title>Login</title>
</head>

<body>

  <?php require_once('headder.php') ?>


  <div class="container">
    <div class="row no-gutter"> <!-- Fila sin separacion entre divs -->

      <div class="col-md-6 d-none d-md-flex bg-image"> <!-- Div mitad para la imagen -->
        <img src="img/carretilla.jpg" alt="Carretilla">
      </div>

      <div class="col-md-6 bg-light"> <!-- Div Mitad para el formulario -->
          <div class="login d-flex align-items-center py-5">
            <div class="col-md-12 col-xl-10 mx-auto">
                <h3 class="display-4">¡Bienvenido!</h3>
                <p class="text-muted mb-4">Completa los datos para ingresar a tu cuenta.</p>
                <form method="post">
                    <div class="form-group mb-3">
                      <label for="exampleInputEmail1">Correo electrónico:</label>
                      <input type="email" class="form-control h6" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@dominio.com" name="email" value='<?=$correoElectronico?>'>
                    </div>
                    <div class="form-group mb-3">
                      <label for="exampleInputPassword1">Contraseña:</label>
                      <input type="password" class="form-control h6" id="exampleInputPassword1" placeholder="" name="password">
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="form-check-input" id="Check1" name="check-usr" value= "Yes">
                      <label class="form-check-label h6 my-1" for="Check1">Recordar mi usuario</label>
                    </div>
                    <button type="submit" class="btn btn-dark rounded-pill btn-block">Ingresar</button>
                    <a type="" class="nav-link strong mt-3" href="recupero.html" name="button">¿Olvidaste tu cuenta?</a>
                </form>
            </div> <!-- Fin Formulario -->

          </div> <!-- Fin contenedor centrado -->
          <div class="col-md-12 col-xl-10 mx-auto"> <!-- Div Envío a registro Formulario -->
            <h4 class="display-5">¿No Tenés Cuenta?</h4>
            <p class="text-muted mb-4">Es necesario tener una cuenta para adquirir nuestros productos o servicios... Es rápido, es fácil Y ES GRATIS. <br>
            Te invitamos a completar el formulario de registro... </p>
            <a type="" class="btn btn-dark rounded-pill btn-block" href="registro.php" name="button">Quiero Registrarme</a>
          </div>
      </div>

    </div>
</div>

  <?php if (isset($erroresEnLogin) && count($erroresEnLogin) > 0) : ?>
    <ul>
      <?php foreach ($erroresEnLogin as $unError) :?>
        <li> <?=$unError?> </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
