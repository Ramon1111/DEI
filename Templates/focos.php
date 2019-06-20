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
  				min-height: 10rem !important;
  			}
        .titulos{
  				font-size: 2.5rem;
  				text-align: center;
  			}
        .azul{
  				background-color: #3B3F76;
  				color: white;
  			}
        .subtitulo1{
          font-size: 2rem;
        }
        .subtitulo2{
          font-size: 1.5rem;
        }
        .onn{
          color:green;
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
                  <a class="dropdown-item" href="./main.php"><i class="far fa-file-alt"></i> Estado General del Hogar</a>
                  <a class="dropdown-item" href="./doors.php"><i class="fas fa-door-open"></i> Control de Puertas</a>
                  <a class="dropdown-item" href="#"><i class="far fa-lightbulb"></i> Control de Luces</a>
                  <a class="dropdown-item" href="./mejakiaron.php"><i class="fas fa-shield-alt"></i> Módulo de seguridad</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog"></i> Configuración
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <!--<a class="dropdown-item" href="#"><i class="fas fa-cog-user"></i> Gestionar cuenta</a>
                  <div class="dropdown-divider"></div>-->
                  <a class="dropdown-item" href="./logOut.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>


        <div class="titulos font-weight-bolder py-4">
          <i class="far fa-lightbulb"></i> Control de Luces
        </div>
        <hr/>

        <div class="row align-items-center justify-content-center text-center my-4">
          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header"><i class="fas fa-lightbulb"></i> Sala, comedor y cocina</div>
              <div class="card-body my-3">
                <p class="card-text subtitulo2">Estado: <span class="led1 font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span>
                </p>
                <button type="button" id="led1" class="led btn btn-primary my-3 subtitulo2" value="0" data-state="led1Low">Encender</button>
              </div>
            </div>
          </div>


          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header"><i class="fas fa-lightbulb"></i> Recamara 1, Pasillo y Baño</div>
              <div class="card-body my-3">
                <p class="card-text subtitulo2">Estado: <span class="led2 font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span>
                </p>
                <button type="button" id="led2" class="led btn btn-primary my-3 subtitulo2" value="0" data-state="led2Low">Encender</button>
              </div>
            </div>
          </div>

          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header"><i class="fas fa-lightbulb"></i> Pórtico y pasillo principal</div>
              <div class="card-body my-3">
                <p class="card-text subtitulo2">Estado: <span class="led3 font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span>
                </p>
                <button type="button" id="led3" class="led btn btn-primary my-3 subtitulo2" value="0" data-state="led3Low">Encender</button>
              </div>
            </div>
          </div>

          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header"><i class="fas fa-lightbulb"></i> Cochera</div>
              <div class="card-body my-3">
                <p class="card-text subtitulo2">Estado: <span class="led4 font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span>
                </p>
                <button type="button" id="led4" class="led btn btn-primary my-3 subtitulo2" value="0" data-state="led4Low">Encender</button>
              </div>
            </div>
          </div>

          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header"><i class="fas fa-lightbulb"></i> Recámara 2 y 3, Baño</div>
              <div class="card-body my-3">
                <p class="card-text subtitulo2">Estado: <span class="led5 font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span>
                </p>
                <button type="button" id="led5" class="led btn btn-primary my-3 subtitulo2" value="0" data-state="led5Low">Encender</button>
              </div>
            </div>
          </div>

          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header"><i class="fas fa-lightbulb"></i> Luces exteriores</div>
              <div class="card-body my-3">
                <p class="card-text subtitulo2">Estado: <span class="led6 font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span>
                </p>
                <button type="button" id="led6" class="led btn btn-primary my-3 subtitulo2" value="0" data-state="led6Low">Encender</button>
              </div>
            </div>
          </div>
        </div>

        <hr/>

        <div class="titulos font-weight-bolder py-4">
          <i class="fas fa-fan"></i> Control del Ventilador
        </div>
        <hr/>

        <div class="row align-items-center justify-content-center text-center my-4">
          <div class="col-xl-5 col-lg-5 col-md-6 col-sm-10">
            <div class="card border-dark my-3">
              <div class="subtitulo1 card-header">Ventilador de la sala</div>
              <div class="card-body my-3">
                <p class="card-text subtitulo2">Estado: <span class="led7 font-weight-bolder"><span class="spinner-border text-dark" role="status">
                          <span class="sr-only">Loading...</span>
                        </span></span>
                </p>
                <button type="button" id="led7" class="led btn btn-primary my-3 subtitulo2" value="0" data-state="led7Low">Encender</button>
              </div>
            </div>
          </div>
        </div>

        <div class="row azul footer text-center justify-content-md-center px-xl-5 px-lg-5 py-4">
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

          pubnub.publish({
            channel: channel,
            message: 'estadoLeds'
          });

          $('.led').click(function(){
            var estaVentana=$(this);
            pubnub.publish({
                channel: channel,
                message: estaVentana.data('state'),
              },function(status, response){
                  if(estaVentana.val()=='0'){
                    estaVentana.val('1');
                    $('span.'+estaVentana.attr('id')).html('Encendido');
                    $('span.'+estaVentana.attr('id')).attr('class',estaVentana.attr('id')+' onn font-weight-bolder');
                    estaVentana.data('state',estaVentana.attr('id')+'High');
                    estaVentana.html('Apagar');
                    estaVentana.attr('class','led btn btn-outline-primary my-3 subtitulo2');
                  }
                  else {
                    estaVentana.val('0');
                    $('span.'+estaVentana.attr('id')).html('Apagado');
                    $('span.'+estaVentana.attr('id')).attr('class',estaVentana.attr('id')+' offf font-weight-bolder');
                    estaVentana.data('state',estaVentana.attr('id')+'Low');
                    estaVentana.html('Encender');
                    estaVentana.attr('class','led btn btn-primary my-3 subtitulo2');
                  }
            });
          });


          pubnub.addListener({
              message: function(msg) {
                if(msg.message.tipo=="1")
                  $("#alerta1").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Gas Peligroso Detectado</strong> El sensor de gases detectó una posible fuga<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                else if(msg.message.tipo=="3")
                  $("#alerta2").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Intruso Detectado</strong> El sensor de movimiento detectó un posible intruso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                else if (msg.message.tipo=="4"){
                  var estadoGeneral=msg.message.mensaje.split(",");
                  for(var i=0; i<estadoGeneral.length;i++){
                    var lugar=1+i;
                    if(estadoGeneral[i]=='0'){
                      $('#led'+lugar).val('0');
                      $('span.led'+lugar).html('Apagado');
                      $('span.led'+lugar).attr('class',"offf led"+lugar+" font-weight-bolder");
                      $('#led'+lugar).data('state','led'+lugar+'Low');
                      $('#led'+lugar).html('Encender');
                      $('#led'+lugar).attr('class','led btn btn-primary my-3 subtitulo2');
                    }
                    else {
                      $('#led'+lugar).val('1');
                      $('span.led'+lugar).html('Encendido');
                      $('span.led'+lugar).attr('class',"onn led"+lugar+" font-weight-bolder");
                      $('#led'+lugar).data('state','led'+lugar+'High');
                      $('#led'+lugar).html('Apagar');
                      $('#led'+lugar).attr('class','led btn btn-outline-primary my-3 subtitulo2');
                    }
                  }
                }
              },
              presence: function(presenceEvent) {
                  console.log(presenceEvent);
              }
          });
        });
      </script>
    </body>
    </html>
