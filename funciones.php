<?php
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

    return $errores;
} // Final de funcion

function getUsuarioLogueado($idUsuario)
{
    //La funcion recupera la clave del usuario logueado a partir del parámetro de $_SESSION[idUsuario]
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
    'avatar'=> $usuarios[getUsuarioLogueado($idUsuario)]['avatar']
    ];
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $telefono = trim($_POST['telefono-f']);
        $celular = trim($_POST['celular']);
        $indice = getUsuarioLogueado($idUsuario);
        $usuarios[$indice]=$usuario;

        file_put_contents("Usuarios.txt", json_encode($usuarios));


        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];
        $_SESSION['telefono-f'] = $usuario['telefono-f'];
        $_SESSION['celular'] = $usuario['celular'];
    }
}
