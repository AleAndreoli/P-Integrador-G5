<?php

function loginCall()
{

    // Declaro array de errores para almacenarlos si es que los encuentro
    $errores = [];

    $usuarios = json_decode(file_get_contents("Usuarios.txt"), true);

    // Variables para persistir la información del usuario y validar
    $correoElectronico = trim($_POST['email']);
    $contrasenia = trim($_POST['password']);

    // Localizar contraseña, si el email existe
    if (empty($correoElectronico)) {
        $errores['errorCorreoElectronico'] = 'Debe ingresar su correo electrónico';
    } elseif (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        $errores['errorCorreoElectronico'] = 'Ingresá una dirección de correo valida';
    } elseif (!empty($usuarios)) {
        foreach ($usuarios as $usuario) {
            if ($correoElectronico == $usuario['email']) {
                $password= $usuario['password'];
                if (password_verify($contrasenia, $password)) {
                    header('location: Index.html'); // Redirecciona al INDEX, aquí debería iniciar sesion "session_start()"
                    exit;
                } else {
                    $errores['errorCorreoElectronico'] = 'Usuario y Contraseña ingresados no coinciden';
                }
            } else {
                $errores['errorCorreoElectronico'] = 'Debe registrarse antes de ingresar al sitio';
            }
        }
    }

    return $errores;
} // Final de Funcion


if (count($_POST)) {

    // Variable para persistir la información del usuario

    $correoElectronico = trim($_POST['email']);
    $contrasenia = $_POST["password"];

    // Esta función guarda el array que retorna la función validarRegistro()
    $erroresEnLogin = loginCall();
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-top">
      <div class="container-fluid">
          <a class="navbar-brand" href="index.html">
           <img src="https://www.plantadeldinero.com/wp-content/uploads/2018/11/6.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
           Green Valley
             </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="user-account.html">Cuenta <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.html">Iniciar Sesion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registro.html">Registrarse</a>
                </li>
                </ul>
            </div>
      </div>
  </nav>


  <div class="container">
        <div class="row">
            <form class="container rounded col-10 col-md-6 mt-5" method="post">
                  <div class="h4 p-2">¡Bienvenido!</div>
                  <div class="h5">Completa los datos para ingresar a tu cuenta.</div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Correo electrónico:</label>
                      <input type="email" class="form-control h6" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@dominio.com" name="email" value='<?php if (count($_POST)):?><?=$correoElectronico?><?php endif?>'>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Contraseña:</label>
                      <input type="password" class="form-control h6" id="exampleInputPassword1" placeholder="" name="password">
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                  <a type="" class="nav-link btn-link strong" href="recupero.html" name="button">¿Olvidaste tu cuenta?</a>
            </form>
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
