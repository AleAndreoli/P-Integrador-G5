<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Source+Sans+Pro&display=swap" rel="stylesheet">
  <title>Green Valley</title>
</head>

<body>

  <?php require_once('headder.php') ?>

  <div id="carousel" class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="carouselSliders" class="carousel slide" data-ride="carousel" data-interval="5000" data-touch=true>
          <ol class="carousel-indicators">
            <li data-target="#carouselSliders" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSliders" data-slide-to="1"></li>
            <li data-target="#carouselSliders" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="img/stress.jpg" alt="Plantas de interior">
              <div class="carousel-caption">
                <h4>Plantas de interior para luchar contra el estrés</h4>
                <p>Conozca nuestra selección de plantas de interior para controlar el stress. Requieren minimos cuidados y conviernten su casa en un verdadero HOGAR.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/plantasdeco.jpg" alt="Suculentas y centros de mesa">
              <div class="carousel-caption">
                <h4>Centros de mesa y arreglos con suculentas</h4>
                <p>Verdaderas piezas de arte vivas que realzan sus ambientes y le dan un estilo único a su espacio.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="img/plantas-aromaticas.jpg" alt="Aromáticas de estación">
              <div class="carousel-caption">
                <h4>Especial aromáticas de estación</h4>
                <p>Perfume sus ambientes y sazone sus comidas. Descubra exquisitas combinaciones y conviertase en un verdadero experto en sensaciones.</p>
              </div>
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselSliders" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselSliders" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="destacados" class="container mt-5">
    <div class="row">
      <div class="col-md-4 mb-2">

        <div class="p-destacado">
          <div class="">
            <img class="img-fluid prueba" alt="Rosales" src="img/p-dest-1.jpg" />
          </div>
          <div class="">
            <p>
              <strong>Exteriores.</strong> <br> Contamos con una amplia gama de productos para ser el centro de atención de tu jardín.
            </p>
          </div>
          <div class="ml-auto mr-auto">
            <a href="#" class="button btn-success"><i class="fa"></i> Ver Más</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-2">

        <div class="p-destacado">
          <div class="">
            <img class="w-100 height: auto" alt="Jazmin Trepador" src="img/plantas-suculentas.jpg" />
          </div>
          <div class="">
            <p>
              <strong>Decorativas.</strong> <br> Necesitas agregarle algo de color a esa pared gris? Aquí encontrarás todo el color que necestias.
            </p>
          </div>
          <div class="ml-auto mr-auto">
            <a href="#" class="button btn-success"><i class="fa"></i> Ver Más</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-2">

        <div class="p-destacado">
          <div class="">
            <img class="w-100" alt="Enredadera" src="img/plantas-de-interior.jpg" />
          </div>
          <div class="">
            <p>
              <strong>Interiores.</strong> <br>Renova tu casa. Ponele un poco más de buenas vibras.
            </p>
          </div>
          <div class="">
            <a href="#" class="button btn-success"><i class="fa"></i> Ver Más</a>
          </div>
        </div>
      </div>
    </div>
  </div>
   <section> <!-- Sección con el contenedor del Market -->
    <div class="container-fluid">
      <h2 id="titulo-market" class="d-flex justify-content-center my-5 bg-secondary text-white py-3">- Nuestros Productos -</h2>
      <div class="row">

        <div class="col-lg-3">
          <nav>
            <h3 class="my-4">Categorias</h3>
            <div class="list-group">
              <a href="#" class="list-group-item">Naturales</a>
              <a href="#" class="list-group-item">Plásticas</a>
              <a href="#" class="list-group-item">Accesorios</a>
            </div>
          </nav>
        </div> <!-- Contenedor filtros -->

        <div class="col-lg-9">

          <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="img/semilla.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Semillas Seleccionadas</a>
                  </h4>
                  <h5>$99.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="img/margaritas.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Plantines Margaritas</a>
                  </h4>
                  <h5>$24.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="img/suegras.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Cola De Tigre</a>
                  </h4>
                  <h5>$29.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="img/alegrias.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Alegrias Del Hogar</a>
                  </h4>
                  <h5>$15.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="img/arreglo-pencas.webp" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Arreglo De Pencas Interior</a>
                  </h4>
                  <h5>$99.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="img/helechos.jpg" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#">Helechos</a>
                  </h4>
                  <h5>$49.99</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div> <!-- Fin Contenedor "Market" -->
   </section>
  <footer id="footer">
    <div class="container-fluid height: 50%">
      <h2 class="h2">Dejanos tus datos y tus comentarios:
      </h2>

      <div class="row">
        <div class="col-md-6 col-sm-12">
          <section>
            <form method="post" action="#">
              <div class="row gtr-50">
                <div class="col-lg-6 col-sm-12">
                  <input name="name" placeholder="Nombre" type="text" />
                </div>
                <div class="col-lg-6 col-sm-12">
                  <input name="email" placeholder="Email" type="text" />
                </div>
                <div class="col-12">
                  <textarea name="message" placeholder="Diganos lo que piensa..."></textarea>
                </div>
                <div class="col-12">
                  <a href="#" class="button btn-success"><i class="fa"></i> Enviar Comentarios </a>
                </div>
              </div>
            </form>
          </section>
        </div>
        <div class="col-md-6 col-sm-12">
          <section>
            <h2 class="h2">También podes encontrarnos en:</h2>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <ul class="icons">
                  <li>
                    <i class="fa fa-home"></i>
                    Estrada 123 <br />
                    Córdoba, CBA 5000 <br />
                    Argentina
                  </li>
                  <li>
                    <i class="fa fa-phone"></i> (351) 555-4241
                  </li>
                  <li>
                    <a class="fa fa-envelope" href="#"> info@greenvalley.com</a>
                  </li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-12">
                <ul>
                  <li>
                    <a class="fa fa-twitter" href="#"> @greenvalley</a>
                  </li>
                  <li>
                    <a class="fa fa-instagram" href="#"> instagram.com/greenvalley</a>
                  </li>
                  <li>
                    <a class="fa fa-facebook" href="#"> facebook.com/greenvalley</a>
                  </li>
                </ul>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
