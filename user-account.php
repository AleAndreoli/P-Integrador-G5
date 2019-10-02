<?php
require_once 'funciones.php';
session_start();

if (count($_POST)) {

    // Variable para persistir la información del usuario
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $telefono = trim($_POST['telefono-f']);
    $celular = trim($_POST['celular']);
    $contrasenia1 = trim($_POST['password1']);
    $contrasenia2 = trim($_POST['password2']);

    // Esta función se dispara sólo si hay $_POST
    actualizarPerfil($_SESSION['idUsuario']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

  <title>TiendaIntegrador - Mi cuenta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  <hr>
  <div class="container-fluid">
    <div class="row">
  		<div class="col-md-12 my-5 bg-secondary text-white py-3">
        <h1>
          <?php if ($_SESSION['nombre']):?><?=$_SESSION['nombre'] ?> <?php else:?> Cosme <?php endif?>
          <?php if ($_SESSION['apellido']):?><?=$_SESSION['apellido'] ?> <?php else:?>Fulanito <?php endif?>
        </h1>
      </div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--Barra lateral-->


        <div class="text-center mt-2">
          <img src="<?=$_SESSION['avatar']?>" class="avatar img-circle img-thumbnail" alt="avatar">
          <!--EN DESARROLLO
          <h6>Modificar Mi Imagen De Perfil</h6>
          <div class="custom-file">
            <label class="custom-file-label" for="carga-img">Seleccione Archivo</label>
            <input type="file" class="custom-file-input" id="carga-img">
          </div>
          -->
        </div>
      </hr> <br>

          <ul class="list-group">
            <li class="list-group-item text-muted">Resumen Actividades</li>
            <!--la idea es contar PHP pedidos del usuario, productos faveados y comentarios-->
            <li class="list-group-item text-right"><span class="float-left"><strong>Compras</strong></span>125</li>
            <li class="list-group-item text-right"><span class="float-left"><strong>Favoritos</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="float-left"><strong>Comentarios</strong></span> 37</li>
          </ul>


        </div><!--Fin barra lateral-->
    	<div class="col-sm-9"> <!--Pestañas-->
            <ul class="nav nav-tabs">
                <li class="active nav-item"><a class="nav-link" data-toggle="tab" href="#home">Mi Perfil</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#compras">Mis Compras</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#direcciones">Mis Direcciones</a></li>
            </ul>


          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" method="post" id="registrationForm">
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="nombre">
                                <h4>
                                  <?php if ($_SESSION['nombre']):?>Nombre: <?=$_SESSION['nombre']?> <?php else:?>Por favor, díganos su nombre <?php endif?>
                                </h4>
                              </label>
                              <input type="text" class="form-control" name="nombre" id="nombre" value='<?php if (count($_POST)):?><?=$nombre?><?php endif?>'placeholder="Nombre/s">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="apellido">
                              <h4>
                              <?php if ($_SESSION['apellido']):?>Apellido: <?=$_SESSION['apellido']?> <?php else:?>Por favor, díganos su apellido <?php endif?>
                              </h4>
                            </label>
                              <input type="text" class="form-control" name="apellido" id="apellido" value='<?php if (count($_POST)):?><?=$apellido?><?php endif?>' placeholder="Apellido">
                          </div>
                      </div>

                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="telefono-f">
                                <h4>
                                <?php if ($_SESSION['telefono-f']):?>Teléfono Fijo: <?=$_SESSION['telefono-f']?> <?php else:?>Por favor, díganos su teléfono fijo <?php endif?>
                                </h4>
                              </label>
                              <input type="text" class="form-control" name="telefono-f" id="telefono-f" value='<?php if (count($_POST)):?><?=$telefono?><?php endif?>' placeholder="Ej: (351)-4614628">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="celular">
                               <h4>
                               <?php if ($_SESSION['celular']):?>Teléfono Celular: <?=$_SESSION['celular']?> <?php else:?>Por favor, díganos su teléfono celular <?php endif?>
                               </h4>
                             </label>
                              <input type="text" class="form-control" name="celular" id="celular" value='<?php if (count($_POST)):?><?=$celular?><?php endif?>' placeholder="Ej: (351)-3370944">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                              <label for="password1"><h4>Contraseña</h4></label>
                              <input type="password" class="form-control" name="password1" id="password1" placeholder="Modificar Contraseña">
                          </div>
                      </div>
                      <div class="form-group">

                          <div class="col-xs-6">
                            <label for="password2"><h4>Verificar Contraseña</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="Verifique su contraseña">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><ion-icon name="checkmark-circle-outline"></ion-icon> Guardar Cambios</button>
                               	<button class="btn btn-lg btn-light" type="reset"><ion-icon name="refresh"></ion-icon> Reiniciar</button>
                            </div>
                      </div>
              	</form>

              <hr>

            </div><!--Final Pestaña Perfil-->
             <div class="tab-pane" id="compras">

               <h2></h2>

               <table class="table table-striped table-hover">
    						<thead>
    							<tr>
    								<th>
    									#
    								</th>
    								<th>
    									Pedido Nº
    								</th>
    								<th>
    									Fecha
    								</th>
    								<th>
    									Estado
    								</th>
    							</tr>
    						</thead>
    						<tbody>
    							<tr>
    								<td>
    									5
    								</td>
    								<td>
    									1428696
    								</td>
    								<td>
    									01/04/2014
    								</td>
    								<td>
    									Pendiente de confirmación
    								</td>
    							</tr>
    							<tr class="table-active">
    								<td>
    									4
    								</td>
    								<td>
    									1428654
    								</td>
    								<td>
    									12/06/2013
    								</td>
    								<td>
    									En delivery
    								</td>
    							</tr>
    							<tr class="table-success">
    								<td>
    									3
    								</td>
    								<td>
    									1428331
    								</td>
    								<td>
    									02/08/2012
    								</td>
    								<td>
    									Entregado
    								</td>
    							</tr>
    							<tr class="table-warning">
    								<td>
    									2
    								</td>
    								<td>
    									1428741
    								</td>
    								<td>
    									03/04/2011
    								</td>
    								<td>
    									Pago pendiente
    								</td>
    							</tr>
    							<tr class="table-danger">
    								<td>
    									1
    								</td>
    								<td>
    									1428998
    								</td>
    								<td>
    									04/06/2010
    								</td>
    								<td>
    									Cancelado
    								</td>
    							</tr>
    						</tbody>
    					</table>

            </div><!--Final Pestaña Pedidos-->

             <div class="tab-pane" id="direcciones">

               <h2></h2>

               <div class="row">
    						<div class="col-md-6">
    							<div class="card bg-default">
    								<h5 class="card-header">
    									Casa
    								</h5>
    								<div class="card-footer">
    									Lima 1128 7º C <br>
                      Bº General Paz <br>
                      Cel: (0351) 151234567 <br>
                      CP X5000ASD <br>
                      Córdoba, Argentina <br>
                      <br>
                      <div class="dropdown">

                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                          Opciones
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="#">Elegir como predeterminada</a> <a class="dropdown-item" href="#">Modificar</a> <a class="dropdown-item" href="#">Eliminar</a>
                        </div>

    								</div>
    							</div>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="card">
    								<h5 class="card-header">
    									Trabajo
    								</h5>
    								<div class="card-footer">
                      Ituzaingó 883 2º B <br>
                      Bº Nueva Córdoba <br>
                      Cel: (0351) 151234567 <br>
                      CP X5008QWE <br>
                      Córdoba, Argentina <br>
                      <br>
                      <div class="dropdown">

                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                          Opciones
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="#">Elegir como predeterminada</a> <a class="dropdown-item" href="#">Modificar</a> <a class="dropdown-item" href="#">Eliminar</a>
                        </div>

    								</div>
    							</div>
    							</div>
    						</div>
    					</div>
    				</div>

          </div><!--Final Pestaña Direcciones-->
        </div>

        </div><!--Final PESTAÑAS-->
    </div><!--Final fila cenral-->

    <!-- Scripts -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
