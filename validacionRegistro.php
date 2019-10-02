<?php

  function validarRegistro()
  {
      // Declaro array de errores para almacenarlos si es que los encuentro
      $errores = [];

      $usuarios = json_decode(file_get_contents("Usuarios.txt"), true);

      // Variables para persistir la información del usuario y validar
      $correoElectronico = trim($_POST['email']);
      $contrasenia1 = trim($_POST['password1']);
      $contrasenia2 = trim($_POST['password2']);
      $aceptatyc = "No";
      if (isset($_POST['check-tyc'])) {
          $aceptatyc = trim($_POST['check-tyc']);
      }

      // Validando Correo electrónico
      if (empty($correoElectronico)) {
          $errores['errorCorreoElectronico'] = 'El correo electrónico es obligatorio';
      } elseif (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
          $errores['errorCorreoElectronico'] = 'Ingresá una dirección de correo valida';
      } elseif (!empty($usuarios)) {
          foreach ($usuarios as $usuario) {
              if ($correoElectronico == $usuario['email']) {
                  $errores['errorCorreoElectronico'] = 'Ya existe un usuario con esa direccion de correo';
              }
          }
      }
      // ValidandoContraseña
      if (empty($contrasenia1)) {
          $errores['errorContrasenia'] = 'La contraseña es obligatoria';
      } elseif (strlen($contrasenia1) < 8 || !preg_match('/[A-Za-z]/', $contrasenia1) || !preg_match('/[0-9]/', $contrasenia1)) {
          $errores['errorContrasenia'] = 'La contraseña debe ser alfanumérica y tener al menos 8 dígitos, ejemplo: "Ejemplo01"';
      } elseif (empty($contrasenia2)) {
          $errores['errorContrasenia'] = 'Es necesesario verificar la contraseña';
      } elseif ($contrasenia1 != $contrasenia2) {
          $errores['errorContrasenia'] = 'Las contraseñas ingresadas no coinciden';
      }

      // Validando aceptación de Term y Cond

      if ($aceptatyc != "Yes") {
          $errores['errorTyC'] = 'Para continuar debe aceptar terminos y condiciones del sitio';
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
