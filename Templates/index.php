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
			img.logo{
				max-width: 20rem;
			}
			div.row{
				min-height: 10rem !important;
			}
			#menuCollapsable{
				text-align: right !important;
			}
			.azul{
				background-color: #3B3F76;
				color: white;
			}
			.footer{
				font-size: 0.9rem;
			}
			span.icono{
				font-size: 1.5rem;
			}
			.titulos{
				font-size: 2.5rem;
			}
			.textoMediano{
				font-size: 1.3rem;
			}
			.centrado{
				padding: 3.5rem 0rem !important;
			}

		</style>

		<script src="../Documents/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="../Documents/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="../Documents/node_modules/popper.js/dist/umd/popper.min.js"></script>
		<script src="https://kit.fontawesome.com/de53577b67.js"></script>
	</head>
	<body>



		<div class="container-fluid">
			<!-- <nav class="navbar navbar-expand-lg navbar-expand-md navbar-dark bg-dark"> -->
			<nav class="navbar navbar-dark bg-dark">
				<span class="navbar-brand mb-0 h1">DEI</span>
				<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuCollapsable" aria-controls="menuCollapsable" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button> -->
				<button class="btn btn-outline-light my-2 my-sm-0" type="button" data-toggle="modal" data-target="#loginModal">Iniciar Sesión</button>
				<!-- <div class="collapse navbar-collapse py-sm-3" id="menuCollapsable">>
						<button class="btn btn-outline-light my-2 my-sm-0" type="button" data-toggle="modal" data-target="#loginModal">Iniciar Sesión</button>
				</div> -->
			</nav>

			<div class="row align-items-center py-5">

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="text-center">
						<img src="../Resources/logo.PNG" class="img-fluid logo">
					</div>
				</div>
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center py-3 my-4">
					<h1>Bienvenido a DEI</h1>
					<!-- <p>Domótica, Esctructura e Inteligencia Artificial.</p>
					<hr class="my-4"/>
					<p>Lo escencial para que tu hogar también cuide de ti</p> -->
					<button type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#loginModal">Ingresar</button>
				</div>
			</div>

			<div class="row azul text-center py-4">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 py-3 px-5 text-center font-weight-bolder titulos">
					¿Quiénes somos?
				</div>
				<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 px-5">
					<p class="textoMediano  pt-4 centrado">
						Somos una empresa que se ha comprometido a desarrollar sistemas de casas inteligetes capaces de brindarle a las personas la comodidad y seguridad que merecen, independientemente si se trate de una persona o una familia completa.
					</p>
				</div>
				<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 px-5">
					<img src="../Resources/casa_inteligente1.jpg" class="img-fluid logo img-thumbnail"/>
				</div>
			</div>

			<div class="row servicios text-center py-4">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 px-5 text-center font-weight-bolder titulos">
					Servicios
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 px-5 py-sm-4">
					<div>
						<span class="icono font-weight-bolder"><i class="fas fa-lock"></i> Seguridad</span>
					</div>
					<p class="textoMediano  pt-3">
						Sabemos que tu hogar debe de estar seguro estando en ella o no. </br>Te ofrcemos lo necesario para mantener en vigilancia lo que sucede.
					</p>
				</div>
				<hr/>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 px-5 py-sm-4">
					<div>
						<span class="icono font-weight-bolder"><i class="fas fa-gamepad"></i> Control</span>
					</div>
					<p class="textoMediano pt-3">
						Conocemos mejor que nadie que el control es parte de las comodidades de tu casa.
					</p>
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
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 px-5 pt-3 text-center">
					<a href="./credits.html"><button class="btn btn-outline-success" type="button">Créditos</button></a>
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
