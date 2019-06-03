<?php
	SESSION_START();
	SESSION_DESTROY();
?>
<!DOCTYPE html>
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

		<!-- <nav class="navbar navbar-light bg-light w-75">
			<span class="navbar-brand mb.0 h1">DEI</span>
		</nav> -->

		<div class="container">
			<nav class="navbar navbar-dark bg-dark">
				<span class="navbar-brand mb.0 h1">DEI</span>
			</nav>
			<div class="text-center">
				<div class="jumbotron my-3">
				<div class="row align-items-center">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-center py-3">
						<h1>Bienvenido a DEI</h1>
						<p>Domótica, Esctructura e Inteligencia Artificial.</p>
						<hr class="my-4"/>
						<p>Lo escencial para que tu hogar también cuide de ti</p>
						<!-- <div class="text-center"> -->
							<button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#loginModal">Ingresar</button>
						<!-- </div> -->
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
						<div class="text-center">
							<img src="../Resources/logo.png" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>

		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="text-center">Ingresar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label for="userName">Nombre de Usuario</label>
							<input type="text" class="form-control" id="userName" placeholder="Nombre de Usuario"/>
						</div>

						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" class="form-control" id="password" placeholder="contraseña"/>
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button id="loginSend" type="button" class="btn btn-primary">Entrar</button>
					</div>

				</div>
			</div>
		</div>

		<script>
			$('#loginSend').click(function(){
				$.ajax({
					url: "./login.php",
					data:{
						usuario: $('#userName').val(),
						contra: $('#password').val()
					},
					type: "POST",
					dataType: "Text",
					success: function(data){
						if(data=='correcto'){
							alert("Bienvenido "+$('#userName').val());
							$(location).attr('href','./main.php');
						}
						else{
							alert('Ingrese bien los valores');
						}
					}
				});
			});
		</script>

	</body>
</html>
