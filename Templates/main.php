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
      <style>
        #welcomeText{
          color: white;
        }
        .textBoton{
          font-size: 1.2em;
        }
      </style>
    </head>
    <body>
      <!-- <h1><?php echo $_SESSION['usuario']?></h1>
      <h1><?php echo $_SESSION['nombre']?></h1>
      <h1><?php echo $_SESSION['apellido']?></h1> -->
      <div class="container">
        <nav class="navbar navbar-dark bg-dark">
          <span class="navbar-brand mb.0 h1">DEI</span>
          <h1 class="text-left" id="welcomeText">Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
        </nav>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
            <div class="textBoton text-center">Botón para abrir y cerrar la puerta</div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center my-2">
            <button type="button" id="openClose1" class="btn btn-primary btn-lg btn-block">Abrir puerta 1</button>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
            <div class="textBoton text-center">Botón para abrir y cerrar la puerta</div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center my-2">
            <button type="button" id="openClose2" class="btn btn-primary btn-lg btn-block">Abrir puerta 2</button>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 my-2">
            <div class="textBoton text-center">Consultar temperatura</div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center my-2">
            <button type="button" id="askTemperature" class="btn btn-primary btn-lg btn-block">Checar temperatura</button>
          </div>
        </div>
      </div>
      <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.21.7.min.js">
      </script>
      <script>
        var channel = 'pubnub_onboarding_channel';

        var pubnub= new PubNub({
            subscribeKey:'sub-c-1c31c1b8-8bcb-11e9-9769-e24cdeae5ee1',
            publishKey: 'pub-c-4872297c-41b7-4f68-ad26-ed2061493795',
            ssl: true
        });
        pubnub.subscribe({
          channels: ['pubnub_onboarding_channel']
        });

        $('#openClose1').click(function(){
          console.log($(this).html());

          alert("Test: Send message to pi");
          if($(this).html()=="Abrir puerta 1"){
            pubnub.publish({
                channel: channel,
                message: 'abrir1'
            });
            $('#openClose1').html('Cerrar puerta 1');
          }

          else if($(this).html()=="Cerrar puerta 1"){
            pubnub.publish({
                channel: channel,
                message: 'cerrar1'
            });
            $('#openClose1').html('Abrir puerta 1');
          }
        });

        $('#openClose2').click(function(){
          console.log($(this).html());

          alert("Test: Send message to pi");
          if($(this).html()=="Abrir puerta 2"){
            pubnub.publish({
                channel: channel,
                message: 'abrir2'
            });
            $('#openClose2').html('Cerrar puerta 2');
          }

          else if($(this).html()=="Cerrar puerta 2"){
            pubnub.publish({
                channel: channel,
                message: 'cerrar2'
            });
            $('#openClose2').html('Abrir puerta 2');
          }
        });


        $('#askTemperature').click(function(){
            pubnub.publish({
                channel: channel,
                message: 'temperatura'
            });
        });

        pubnub.addListener({
            message: function(msg) {
                if(msg.message.tipo=="1")
                  alert("Aiua, se quema tu casa"+msg.message.mensaje);
                else if (msg.message.tipo=="2")
                  alert(msg.message.mensaje);
            },
            presence: function(presenceEvent) {
                // handle presence
            }
        });
      </script>
    </body>
    </html>
