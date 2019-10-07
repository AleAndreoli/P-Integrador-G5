<?php
if (!isset($_SESSION['idUsuario'])) {
    session_start();
}

require_once('funciones.php');
if (isset($_GET['cerrarSesion'])) {
    FinalizarSesion();
}

 ?>


<nav class="navbar navbar-expand-lg navbar-light navbar-top py-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
         <img src="img/logotipos/GreenValleyDer.png" alt="">
        </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="Index.php">Home</a>
              </li>
              <?php if (isset($_SESSION['estado']) && $_SESSION['estado'] == "Activa"): ?>
                <li class="nav-item">
                  <a class="nav-link" href="user-account.php">Cuenta<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?cerrarSesion">Cerrar Sesion</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Iniciar Sesion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registro.php">Registrarse</a>
                </li>
              <?php endif ?>
                <li class="nav-item">
                  <a class="nav-link" href="FAQ.php">Preguntas Frecuentes</a>
                </li>
            </ul>
          </div>
    </div>
</nav>
