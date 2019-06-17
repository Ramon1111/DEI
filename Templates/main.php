<?php
  SESSION_START()
?>
  <!DOCTYPE html>
  <html lang=en>
    <head>
  		<meta charset="utf-8"/>
  		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

  		<title>DEI</title>

  		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  		<link href="../Documents/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>

  		<script src="../Documents/node_modules/jquery/dist/jquery.min.js"></script>
  		<script src="../Documents/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  		<script src="../Documents/node_modules/popper.js/dist/umd/popper.min.js"></script>

      <script src="https://kit.fontawesome.com/de53577b67.js"></script>

      <style>
        #welcomeText{
          color: white;
        }
        .textBoton{
          font-size: 1.2em;
        }
        div.row{
  				min-height: 5rem !important;
  			}
        .azul{
  				background-color: #3B3F76;
  				color: white;
  			}
        .titulos{
  				font-size: 2.5rem;
  				text-align: center;
  			}
        .titulos2{
  				font-size: 2.2rem;
  				text-align: center;
  			}
        .subtitulo1{
          font-size: 2rem;
        }
        .subtitulo2{
          font-size: 1.5rem;
        }
        .subtituloT{
          font-size: 3rem;
        }
      </style>
    </head>
    <body>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <span class="navbar-brand mb-0 h1 mr-4">DEI</span>
          <!--Aquí irá el menu para las opciones de control-->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menú
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#"><i class="far fa-file-alt"></i> Estado General del Hogar</a>
                  <a class="dropdown-item" href="./doors.php"><i class="fas fa-door-open"></i> Control de Puertas</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog"></i> Configuración
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-cog-user"></i> Gestionar cuenta</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./logOut.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <div class="titulos text-center py-3">
          <i class="far fa-file-alt"></i> Estado general del hogar
        </div>

        <hr/>

        <div class="titulos2"><i class="fas fa-door-open"></i> Puertas <a href="./doors.php" class="ml-5"><button class="btn btn-primary subtitulo2" type="button">Control</button></a></div>

        <div class="row align-items-center justify-content-center text-center my-4">
          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header">Puerta principal</div>
              <div class="card-body">
                <p class="card-text subtitulo2">Estado: <span id="puertaPrincipal" class="font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span></p>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header text-center">Puerta del garage</div>
              <div class="card-body">
                <p class="card-text  subtitulo2">Estado: <span id="puertaGarage" class="font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span></p>
              </div>
            </div>
          </div>
        </div>

        <hr/>

        <div class="titulos2"><i class="fas fa-thermometer-three-quarters"></i> Temperatura</div>
        <div class="row align-items-center text-center justify-content-md-center py-1">
          <div class="subtituloT col-sm-12">
            <span id="temperatura" class="font-weight-bolder"><div class="spinner-border text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div></span>
          </div>
        </div>

        <div class="row azul footer text-center justify-content-md-center mt-4 px-xl-5 px-lg-5 py-4">
  				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 px-5">
  					<span id="copyright">Copyright © DEI: Domótica, Estructura e Inteligencia artificial</span>
  				</div>
  				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 px-5 py-sm-2">
  					<span class="telefono"><i class="fas fa-mobile-alt"></i> Tel: 55-29-16-85-03</span>
  				</div>
  				<div class="col-xl-7 col-lg-7 col-md-10 col-sm-12 px-5 py-3">
  					<span class="telefono">Hecho en México, Universidad Nacional Autónoma de México. Todos los derechos reservados. Esta página fue desarrollada por miembros del Programa de Alto Rendimiento Académico (PARA) de la Facultad de ingeniería.</span>
  				</div>
  			</div>

      </div>
      <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.21.7.min.js">
      </script>
      <script>
        $(document).ready(function(){
          var channel = 'pubnub_onboarding_channel';

          var pubnub= new PubNub({
              subscribeKey:'sub-c-1c31c1b8-8bcb-11e9-9769-e24cdeae5ee1',
              publishKey: 'pub-c-4872297c-41b7-4f68-ad26-ed2061493795',
              ssl: true
          });

          pubnub.subscribe({
            channels: ['pubnub_onboarding_channel']
          });

          //Función para pedir el estado de las puertas y temperatura
          pubnub.publish({
            channel: channel,
            message: 'estado'
          });

          pubnub.addListener({
              message: function(msg) {
                  if(msg.message.tipo=="1")
                    alert("Aiua, se quema tu casa");
                  else if (msg.message.tipo=="0"){
                    var estadoGeneral=msg.message.mensaje.split(",");
                    if(estadoGeneral[0]=='0')
                      $('#puertaPrincipal').html('<i class="fas fa-lock"></i> Cerrada');
                    else
                      $('#puertaPrincipal').html('<i class="fas fa-lock-open"></i> Abierta');

                    if(estadoGeneral[1]=='0')
                      $('#puertaGarage').html('<i class="fas fa-lock"></i> Cerrada');
                    else
                      $('#puertaGarage').html('<i class="fas fa-lock-open"></i> Abierta');
                    $('#temperatura').html(estadoGeneral[2]+' °C');
                  }
              },
              presence: function(presenceEvent) {
                  // handle presence
              }
          });
        });
      </script>
    </body>
    </html>
