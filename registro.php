<?php
require_once 'validacionRegistro.php';
$listaUsuarios = json_decode(file_get_contents("Usuarios.txt"), true);
$aceptatyc = "No";
if (count($_POST)) {

    // Variable para persistir la información del usuario

    $correoElectronico = trim($_POST['email']);
    if (isset($_POST['check-tyc'])) {
        $aceptatyc = trim($_POST['check-tyc']);
    }



    // Esta función guarda el array que retorna la función validarRegistro()
    $erroresEnRegistro = validarRegistro();

    // Si no tiene nada el array de errores
    if (!count($erroresEnRegistro)) {
        $usuario=[
        'idUsuario'=> ($listaUsuarios == null) ? 1 : count($listaUsuarios) + 1,
        'nombre'=> $_POST["name"],
        'email'=> $_POST["email"],
        'user'=> $_POST["username"],
        'password'=> password_hash($_POST["password1"], PASSWORD_DEFAULT),
        'direcciones' => [],
        'tyc-accepted'=> date("Y-m-d H:i:s"),
        'documento'=>""
        ];

        //echo var_dump($usuario)."<br>";

        $usuarios= json_decode(file_get_contents("Usuarios.txt"), true);
        //echo var_dump($usuarios)."<br>";

        $usuarios[]=$usuario;

        file_put_contents("Usuarios.txt", json_encode($usuarios));

        header('location: Index.html'); //Redirecciona al Index, deberíamos tener una pág de reg exitoso
        exit;
    }
}
if ($_FILES) {
  if ($_FILES["fotoperfil"]["error"] != 0) {
    return "Hubo un error en la carga de la foto. <br>";
  } else {
    $ext = pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION);
    if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
      return "La imagen tiene que ser jpg, jpeg o png. <br>";
    } else {
      move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], "archivos/fotoperfil.".$ext);
      return "Se cargo correctamente tu imagen";
    }
  }
}
?>
<!doctype html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/registro.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Source+Sans+Pro&display=swap" rel="stylesheet">
  <title>Registro</title>
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
            <form class="container rounded col-10 col-md-6 mt-5" method='post' enctype="multipart/form-data">
                <div class="h4 p-2">¡Registrate para comprar tus productos!</div>
                <div class="5">En solo 7 pasos ya estarás adentro de tu cuenta.</div>
                <div class="form-control">
                  <label for="InputFile h6">Carga tu foto de perfil</label>
                  <input type="file" name="fotoperfil" value="">
                </div>
                <div class="form-control">
                  <label for="InputName h6">Escribí tu nombre completo:</label>
                  <input type="text" class="form-control" name="name" value="">
                </div>
                <div class="form-control">
                  <label for="InputName h6">Elegí tu nombre de usuario:</label>
                  <input type="text" class="form-control" name="username" value="">
                </div>
                <div class="form-group">
                    <label for="InputEmail h6">Ingresa tu e-mail:</label>
                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="email@dominio.com" name= "email" value='<?php if (count($_POST)):?><?=$correoElectronico?><?php endif?>'>
                </div>
                <div class="form-group">
                    <label for="InputPassword1 h6">Elegí tu contraseña:</label>
                    <input type="password" class="form-control" id="InputPassword1" placeholder="" name="password1">
                    <small id="emailHelp" class="form-text text-white">Tiene que contener 8 dígitos alfanuméricos.</small>
                </div>
                <div class="form-group">
                    <label for="InputPassword2 h6">Confirma tu contraseña:</label>
                    <input type="password" class="form-control" id="InputPassword2" placeholder="" name="password2">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="Check1" name="check-tyc" value= "Yes" <?php if ($aceptatyc == "Yes"):?>checked<?php endif?>>
                    <label class="form-check-label h6" for="Check1">Acepto los Términos y condiciones.</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Confirmar</button>
                <a type="" class="nav-link btn-link strong" href="login.html" name="button">Ya tengo cuenta</a>
            </form>
        </div>
  </div>

  <?php if (isset($_FILES)) : ?>
    <ul>
      <li><?=$imagen?></li>
    </ul>
  <?php endif; ?>

  <?php if (isset($erroresEnRegistro) && count($erroresEnRegistro) > 0) : ?>
    <ul>
      <?php foreach ($erroresEnRegistro as $unError) :?>
        <li> <?=$unError?> </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
