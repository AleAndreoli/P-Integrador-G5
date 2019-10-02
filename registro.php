<?php
require_once 'validacionRegistro.php';
$listaUsuarios = json_decode(file_get_contents("Usuarios.txt"), true);
$aceptatyc = "No";
if (count($_POST)) {

    // Variable para persistir la información del usuario

    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $username = trim($_POST["username"]);
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
        'nombre'=> $_POST["nombre"],
        'apellido'=> $_POST["apellido"],
        'email'=> $_POST["email"],
        'user'=> $_POST["username"],
        'password'=> password_hash($_POST["password1"], PASSWORD_DEFAULT),
        'direcciones' => [],
        'tyc-accepted'=> date("Y-m-d H:i:s"),
        'documento'=>"",
        'avatar'=>""
        ];

        if ($_FILES["fotoperfil"]["size"] != 0) {
            //envío foto a imagenes de perfil
            $ext = pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], "img/perfiles/fotoperfil".$usuario['idUsuario'].".".$ext);
            //guardo ruta en el usuario
            $usuario['avatar'] = "img/perfiles/fotoperfil".$usuario['idUsuario'].".".$ext;
        }



        $usuarios= json_decode(file_get_contents("Usuarios.txt"), true);
        //echo var_dump($usuarios)."<br>";

        $usuarios[]=$usuario;

        file_put_contents("Usuarios.txt", json_encode($usuarios));

        header('location: Index.html'); //Redirecciona al Index, deberíamos tener una pág de reg exitoso
        exit;
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
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase text-center"><h4 class="font-weight-bold">¡Registrate para comprar tus productos!</h4></div>
          <p class="my-4 px-4">En solo 7 pasos estarás adentro de tu cuenta y explorando nuestras maravillosas ofertas... Si ya tenés una cuenta <a type="" href="login.php" name="button">seguí por acá</a></p>
        </div>
        <form class="col-md-8 bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold" method='post' enctype="multipart/form-data">
            <div class="form-group">
              <label class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold" for="InputFile h6">Carga tu foto de perfil</label>
              <input class= "form-control-file" type="file" name="fotoperfil" value="" >
            </div>
            <div class="form-group">
              <label class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold" for="InputName h6">Decinos tu nombre:</label>
              <input type="text" class="form-control" name="nombre" value='<?php if (count($_POST)):?><?=$nombre?><?php endif?>'>
            </div>
            <div class="form-group">
              <label class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold" for="InputName h6">Y tu apellido?:</label>
              <input type="text" class="form-control" name="apellido" value='<?php if (count($_POST)):?><?=$apellido?><?php endif?>'>
            </div>
            <div class="form-group">
              <label class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold"for="InputName h6">Elegí tu nombre de usuario:</label>
              <input type="text" class="form-control" name="username" value='<?php if (count($_POST)):?><?=$username?><?php endif?>'>
            </div>
            <div class="form-group">
              <label class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold" for="InputEmail h6">Ingresa tu e-mail:</label>
              <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="email@dominio.com" name= "email" value='<?php if (count($_POST)):?><?=$correoElectronico?><?php endif?>'>
              <small class="form-text text-muted">Tranquilo, jamás compartiremos esta información con alguien más.</small>
            </div>
            <div class="form-group">
                <label class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold" for="InputPassword1 h6">Elegí tu contraseña:</label>
                <input type="password" class="form-control" id="InputPassword1" placeholder="" name="password1">
                <small id="emailHelp" class="form-text text-muted">Tiene que contener 8 dígitos alfanuméricos.</small>
            </div>
            <div class="form-group">
                <label class="bg-light rounded-pill px-4 py-1 text-uppercase font-weight-bold" for="InputPassword2 h6">Confirma tu contraseña:</label>
                <input type="password" class="form-control" id="InputPassword2" placeholder="" name="password2">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="Check1" name="check-tyc" value= "Yes" <?php if ($aceptatyc == "Yes"):?>checked<?php endif?>>
                <label class="form-check-label h6 my-1" for="Check1">Acepto los Términos y condiciones.</label>
            </div>
            <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block my-3">Confirmar</button>
        </form>
    </div>
  </div>

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
