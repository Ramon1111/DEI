<?php
  SESSION_START()
?>
<!-- <!DOCTYPE html>
<html lang=en>
  <head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

		<title>DEI</title>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="../Documents/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
		<style>
			body{
				/* background-color: #416fad; */
			}
		</style>

		<script src="../Documents/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="../Documents/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="../Documents/node_modules/popper.js/dist/umd/popper.min.js"></script>
  </head>
  <body>
    <h1><?php echo $_SESSION['usuario']?></h1>
    <h1><?php echo $_SESSION['nombre']?></h1>
    <h1><?php echo $_SESSION['apellido']?></h1>
    <div class="container">
      <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb.0 h1">DEI</span>
      </nav>
    </div>

  </body> </html> -->
<?php

$command = escapeshellcmd('python testSendN.py');
$newString = shell_exec($command);
#$newString=exec(testSendN.py);

echo $newString;
?>
