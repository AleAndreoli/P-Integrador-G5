<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utfc-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Preguntas Frecuentes</title>
  </head>
  <body>

    <?php require_once("headder.php") ?>

    <div class="container">

      <div class="row">
        <div class="col-md-9 mx-auto">

            <div id="acordeon" class="accordion shadow"> <!-- Accordeon -->
              <div class="card"> <!-- Div Pregunta 1 -->
                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                    <h2 class="mb-0">
                        <button type="button" data-toggle="collapse" data-target="#respuesta1" aria-expanded="true" aria-controls="respuesta1" class="btn btn-link text-dark font-weight-bold text-uppercase collapsible-link">Si vivo en un departamento, necesito tener balcón para mis plantas</button>
                    </h2>
                </div>
                <div id="respuesta1" data-parent="#acordeon" class="collapse show">
                    <div class="card-body p-5">
                        <p class="font-weight-light m-0">No, en absoluto. En Green Valley tenemos TODA una sección de plantas seleccionadas para interiores que no requieren espacios abiertos. Nuestros especialistas pueden ayudarte a encontrar las especies ideales para las condiciones de temperatura e iluminación de tu hogar.</p>
                    </div>
                  </div>
                </div>


                <div class="card"> <!-- Div Pregunta 2 -->
                    <div  class="card-header bg-white shadow-sm border-0">
                        <h2 class="mb-0">
                            <button type="button" data-toggle="collapse" data-target="#respuesta2" aria-expanded="false" aria-controls="respuesta2" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">Es necesario regar las plantas todos los días?</button>
                        </h2>
                    </div>
                    <div id="respuesta2" data-parent="#acordeon" class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Si te preocupa no pasar suficiente tiempo en tu casa para regar a tus nuevas compañeras de hogar, no temas, contamos con una amplia gama de especies que pueden resistir más de una semana sin riego.</p>
                        </div>
                    </div>
                </div>

                <div class="card"> <!-- Div Pregunta 3 -->
                    <div class="card-header bg-white shadow-sm border-0">
                        <h2 class="mb-0">
                            <button type="button" data-toggle="collapse" data-target="#respuesta3" aria-expanded="false" aria-controls="respuesta3" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">Tengo que gastar mucho dinero en fertilizantes?</button>
                        </h2>
                    </div>
                    <div id="respuesta3" data-parent="#acordeon" class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">La respuesta es NO. Tus plantas pueden vivir y ser hermosas sin ayuda de fertilizantes. Independientemente de eso, algún descuido puede causar que tu planta se decaiga o enferme. En ese caso, te ayudaremos a recuperarla y si es necesario a fertilizarla.</p>
                        </div>
                    </div>
                </div>

                <div class="card"> <!-- Div Pregunta 4 -->
                    <div class="card-header bg-white shadow-sm border-0">
                        <h2 class="mb-0">
                            <button type="button" data-toggle="collapse" data-target="#respuesta4" aria-expanded="false" aria-controls="respuesta4" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">Es cierto que debo criar mis orquideas en el baño?</button>
                        </h2>
                    </div>
                    <div id="respuesta4" data-parent="#acordeon" class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">No, no es cierto que DEBAS hacerlo, pero puede que sea necesario. Algunas especies de orquideas requieren de condiciones de temperatura y humedad muy específicas y similares a las de un baño. No te preocupes, aún así vas a poder lucirlas cuando tengas visitas en los distintos ambientes de tu casa.</p>
                        </div>
                    </div>
                </div>

                <div class="card"> <!-- Div Pregunta 4 -->
                    <div class="card-header bg-white shadow-sm border-0">
                        <h2 class="mb-0">
                            <button type="button" data-toggle="collapse" data-target="#respuesta4" aria-expanded="false" aria-controls="respuesta4" class="btn btn-link collapsed text-dark font-weight-bold text-uppercase collapsible-link">Hay plantas de interior peligrosas para las mascotas?</button>
                        </h2>
                    </div>
                    <div id="respuesta4" data-parent="#acordeon" class="collapse">
                        <div class="card-body p-5">
                            <p class="font-weight-light m-0">Si, las hay. Pero mayormente son más peligrosas las mascotas para las plantas que a la inversa. Nuestro equipo te ayudará a mantener a tus plantas y mascotas seguras por igual. Nada mejor que un ecosistema equilibrado para vivir en perfecta armonía</p>
                        </div>
                    </div>
                </div>

            </div><!-- Fin Acordeon -->
        </div>
    </div> <!-- Fin Fila -->
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
