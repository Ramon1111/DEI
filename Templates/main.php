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
            <button type="button" id="openClose" class="btn btn-primary btn-lg btn-block">Abrir puerta 1</button>
          </div>
        </div>
      </div>
      <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.21.7.min.js">
      </script>
      <script>
        $('#openClose').click(function(){
          console.log($(this).html());
          var channel = 'pubnub_onboarding_channel';

          var pubnub= new PubNub({
              subscribeKey:'sub-c-1c31c1b8-8bcb-11e9-9769-e24cdeae5ee1',
              publishKey: 'pub-c-4872297c-41b7-4f68-ad26-ed2061493795',
          });

              alert("Test: Send message to pi");//Testing only
              /*pubnub.publish({
                  channel: channel,
                  message: 'on'
              });*/
          if($(this).html()=="Abrir puerta 1"){
            pubnub.publish({
                channel: channel,
                message: 'abrir'
            });
            $('#openClose').html('Cerrar puerta 1');
            /*$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
            //estado 0 significa "CERRADO", o sea, hay que abrir la puerta
            $.ajax({
              url:"abrirCerrar.php",
              //url: "../sensors/openDoor1.py"
              data:{
               	estado: 0
              },
              type: "POST",
              dataType: "Text",
              success: function(data){
                console.log(data);
                $('#openClose').html('Cerrar puerta 1');
              }
            });*/
          }

          else if($(this).html()=="Cerrar puerta 1"){
            pubnub.publish({
                channel: channel,
                message: 'cerrar'
            });
            $('#openClose').html('Abrir puerta 1');
            /*$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
            //estado 0 significa "CERRADO", o sea, hay que abrir la puerta
            $.ajax({
              url:"abrirCerrar.php",
              data:{
                estado: 1
              },
              type: "POST",
              dataType: "Text",
              success: function(data){
                console.log(data);
                $('#openClose').html('Abrir puerta 1');
              }
            });*/
          }
        });
      </script>
    </body>
    </html>
  <?php

  //$command = escapeshellcmd('python testSendN.py');
  //$newString = shell_exec($command);
  #$newString=exec(testSendN.py);

  //echo $newString;
?>
