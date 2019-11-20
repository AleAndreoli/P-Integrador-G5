<?php
function loginCall()
{

    // Declaro array de errores para almacenarlos si es que los encuentro
    $errores = [];

    $usuarios = json_decode(file_get_contents("Usuarios.txt"), true);

    // $usuarios = Usuario::all();

    // Variables para persistir la información del usuario y validar
    // $correoElectronico = trim($request->input('email'))
    $correoElectronico = trim($_POST['email']);
    $contrasenia = trim($_POST['password']);



    // Localizar contraseña, si el email existe

    // @if($errores)
    // @endif

    if (empty($correoElectronico)) {
        $errores['errorCorreoElectronico'] = 'Debe ingresar su correo electrónico';
    } elseif (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
        $errores['errorCorreoElectronico'] = 'Ingresá una dirección de correo valida';
    } elseif (!empty($usuarios)) {
        foreach ($usuarios as $usuario) {
            if ($correoElectronico == $usuario['email']) {
                $password= $usuario['password'];
                if (password_verify($contrasenia, $password)) {
                    session_start();
                    session_regenerate_id(true);
                    $_SESSION['estado'] = "Activa";
                    $_SESSION['idUsuario'] = $usuario['idUsuario'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    $_SESSION['apellido'] = $usuario['apellido'];
                    $_SESSION['telefono-f'] = $usuario['telefono-f'];
                    $_SESSION['celular'] = $usuario['celular'];
                    $_SESSION['direcciones'] = $usuario['direcciones'];
                    $_SESSION['avatar'] = $usuario['avatar'];
                    if ($_POST['check-usr']=='Yes') {
                        setcookie("UsuarioLogueado", $usuario['email'], time()+(3600*24*7)); // Recuerda el último usuario logueado, expira en una semana.
                    }
                    header('location: Index.php');
                    exit;
                } else {
                    $errores['errorCorreoElectronico'] = 'Usuario y Contraseña ingresados no coinciden';
                }
            } else {
                $errores['errorCorreoElectronico'] = 'Debe registrarse antes de ingresar al sitio';
            }
        }
    }
    $errores['errorCorreoElectronico'] = 'Debe registrarse antes de ingresar al sitio';
    return $errores;
} // Final de Funcion



function validarUsuario()
{
    //La funcion valida los datos ingresados en el perfil del usuario

    // Declaro array de errores para almacenarlos si es que los encuentro
    $errores = [];

    // Variables para persistir la información del usuario y validar
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $telefono = trim($_POST['telefono-f']);
    $celular = trim($_POST['celular']);
    $contrasenia1 = trim($_POST['password1']);
    $contrasenia2 = trim($_POST['password2']);


    // ValidandoContraseña
    if (!empty($contrasenia1)) {
        if (strlen($contrasenia1) < 8 || !preg_match('/[A-Za-z]/', $contrasenia1) || !preg_match('/[0-9]/', $contrasenia1)) {
            $errores['errorContrasenia'] = 'La contraseña debe ser alfanumérica y tener al menos 8 dígitos, ejemplo: "Ejemplo01"';
        } elseif (empty($contrasenia2)) {
            $errores['errorContrasenia'] = 'Es necesesario verificar la contraseña';
        } elseif ($contrasenia1 != $contrasenia2) {
            $errores['errorContrasenia'] = 'Las contraseñas ingresadas no coinciden';
        }
    }

    //Validando imagen de perfil (si se cargó)

    if ($_FILES["fotoperfil"]["size"] != 0) {
        if ($_FILES["fotoperfil"]["error"] != 0) {
            $errores['errorimagen'] = "Hubo un error en la carga de la foto. <br>";
        } else {
            $ext = pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION);
            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
                $errores['errorimagen'] = "La imagen tiene que ser jpg, jpeg o png. <br>";
            }
        }
    }

    return $errores;
} // Final de funcion

function getUsuarioLogueado($idUsuario)
{
    // return Auth::user();
    // La funcion recupera la clave del usuario logueado a partir del parámetro de $_SESSION[idUsuario]
    $usuarios = json_decode(file_get_contents("Usuarios.txt"), true);

    foreach ($usuarios as $clave => $usuario) {
        if ($idUsuario == $usuario['idUsuario']) {
            return $clave;
            exit;
        }
    }
}

function actualizarPerfil($idUsuario)
{
    $erroresEnActualizacion = validarUsuario();

    if (!count($erroresEnActualizacion)) {
        $usuarios = json_decode(file_get_contents("Usuarios.txt"), true);

        $usuario=[
    'idUsuario'=> $usuarios[getUsuarioLogueado($idUsuario)]['idUsuario'],
    'nombre'=> (!empty($_POST['nombre'])) ? $_POST['nombre'] : $usuarios[getUsuarioLogueado($idUsuario)]['nombre'],
    'apellido'=>(!empty($_POST['apellido'])) ? $_POST['apellido'] : $usuarios[getUsuarioLogueado($idUsuario)]['apellido'],
    'telefono-f'=>(!empty($_POST['telefono-f'])) ? $_POST['telefono-f'] : $usuarios[getUsuarioLogueado($idUsuario)]['telefono-f'],
    'celular'=>(!empty($_POST['celular'])) ? $_POST['celular'] : $usuarios[getUsuarioLogueado($idUsuario)]['celular'],
    'email'=> $usuarios[getUsuarioLogueado($idUsuario)]['email'],
    'user'=> $usuarios[getUsuarioLogueado($idUsuario)]['user'],
    'password'=> (!empty($_POST['password1'])) ? password_hash($_POST["password1"], PASSWORD_DEFAULT) : $usuarios[getUsuarioLogueado($idUsuario)]['password'],
    'direcciones' => $usuarios[getUsuarioLogueado($idUsuario)]['direcciones'],
    'tyc-accepted'=>  $usuarios[getUsuarioLogueado($idUsuario)]['tyc-accepted'],
    'avatar'=> ($_FILES["fotoperfil"]["size"] != 0)?"img/perfiles/fotoperfil".$usuarios[getUsuarioLogueado($idUsuario)]['idUsuario'].".".pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION):$usuarios[getUsuarioLogueado($idUsuario)]['avatar']
    ];
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $telefono = trim($_POST['telefono-f']);
        $celular = trim($_POST['celular']);

        // if ($request->hasFile('fotoperfil')) {

        if ($_FILES["fotoperfil"]["size"] != 0) {
            //envío foto a imagenes de perfil
            $ext = pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], "img/perfiles/fotoperfil".$usuario['idUsuario'].".".$ext);
        }

        $indice = getUsuarioLogueado($idUsuario);
        $usuarios[$indice]=$usuario;

        file_put_contents("Usuarios.txt", json_encode($usuarios));


        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];
        $_SESSION['telefono-f'] = $usuario['telefono-f'];
        $_SESSION['celular'] = $usuario['celular'];
        $_SESSION['avatar'] = $usuario['avatar'];
    }
}

function FinalizarSesion()
{
    session_destroy();
    header('location: Index.php');
}
