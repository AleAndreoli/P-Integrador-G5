<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Carga Producto</title>
  </head>
  <body>
    <?php require_once('headder.php') ?>

    <div class="container m-auto">
    <div class="row justify-content-center">

      <form class="form" method="post" enctype="multipart/form-data" id="registrationForm">
          <div class="form-group">

              <div class="col-xs-6">
                  <label for="producto">
                    <h4>
                      Nombre Producto <!--Requiere lógica de nombre para producto existente o preguntar nombre-->
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value='' placeholder="Nombre/s"><!--En value se debe insertar el nombre si existiera-->
              </div>

          </div>

          <div class="form-group">

              <div class="col-xs-6">
                  <label for="producto">
                    <h4>
                      Precio <!--Requiere lógica de precio para producto existente o preguntar nombre-->
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value='' placeholder="precio"><!--En value se debe insertar el nombre si existiera-->
              </div>

          </div>

          <div class="form-group">

              <div class="col-xs-6">
                  <label for="producto">
                    <h4>
                      Descuento <!--Requiere lógica de Descuento para producto existente o preguntar precio-->
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value='' placeholder="Descuento"><!--En value se debe insertar el nombre si existiera-->
              </div>

          </div>

          <div class="form-group">

              <div class="col-xs-6">
                  <label for="producto">
                    <h4>
                      Proveedor <!--Requiere lógica de proveedor para producto existente o preguntar id_proveedor-->
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value='' placeholder="id/proveedor"><!--En value se debe insertar el nombre si existiera-->
              </div>

          </div>


          <h4>Cargar Imagen De Producto</h4>
          <div class="custom-file">
            <div class="col-xs-6">
              <label class="custom-file-label" for="carga-img">Seleccione Archivo</label>
              <input type="file" class="custom-file-input" name="fotoperfil" lang="es">
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

  </div>
  </div>
  <!-- Scripts -->
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
