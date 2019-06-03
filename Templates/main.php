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

  </body>
</html> -->
<html>
<head>
<meta name="viewport" content="width=device-width" />
<title>LED Control</title>
</head>
        <body>
        LED Control:
        <form method="get" action="gpio.php">
                <input type="submit" value="ON" name="on">
                <input type="submit" value="OFF" name="off">
        </form>
        <?php
        $setmode17 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
        if(isset($_GET['on'])){
                $gpio_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
                echo "LED is on";
        }
        else if(isset($_GET['off'])){
                $gpio_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
                echo "LED is off";
        }
        ?>
       </body>
</html>
