<!DOCTYPE html>
<html>
<head>
	<title>ConectApp</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icon_conectapp.jpg">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style type="text/css">
		.footer {
		  /*position: fixed;*/
		  left: 0;
		  bottom: 0;
		  width: 100%;
		  background-color: green;
		  color: white;
		  text-align: center;
		}

		@media (max-width: 769px) {

			#PersonasBox {
			  margin-bottom: 100px;
			}
		}

		@media (min-width: 770px) {
			#brandText{
				display: ;
			}
		}
	</style>
</head>
<body>
	<header>
		<div class="navbar shadow-sm" style="background-color: green;">
			<div class="container d-flex justify-content-between">
				<a href="#" class="navbar-brand d-flex align-items-center">
					<img src="/img/icon_conectapp.jpg" style="height: 30px;border-radius: 50%;">
					<strong id="brandText" style="margin-left: 10px;color: white;">ConectApp</strong>
				</a>
				<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<i class="material-icons" style="color: white;">contact_support</i>
				</button> -->
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row justify-content-md-center" style="margin-top: 10px;margin-bottom: -20px;">
			<div class="col-md-auto">
				<b><i>Infórmate, conéctate y descubre el potencial de tus residuos</i></b>
			</div>
		</div>

		<div class="row" style="margin-top: 50px;">
			<div class="col-md-6">
				<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
					<div class="card mb-4 shadow-sm">
						<img class="card-img-top" src="img/punto-de-acopio.jpg" title="Punto de recolección">
						<div class="card-body">
							<p class="card-text" style="color: black;"><b>Punto de recolección</b><br>
							ingresa como organización que busca elementos para reutilizarlos según los estándares de la economía circular</p>
							<div class="d-flex justify-content-between align-items-center">
								<!-- <div class="btn-group">
									<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
									<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
								</div> -->
								<!-- <small class="text-muted">9 mins</small> -->
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col-md-6" id="PersonasBox">
				<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
					<div class="card mb-4 shadow-sm">
						<img class="card-img-top" src="img/objets.jpg" title="Personas" style="height: 315px;
    width: 300px;
    margin-left: auto;
    margin-right: auto;">
						<div class="card-body">
							<p class="card-text" style="color: black;"><b>Personas</b><br> Publica tus objetos para dar o vender y adquirirlos según sean tus necesidades y aporta a reducir la sobre explotación del los recursos naturales</p>
							<div class="d-flex justify-content-between align-items-center">
								<!-- <div class="btn-group">
									<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
									<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
								</div> -->
								<!-- <small class="text-muted">9 mins</small> -->
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>

		<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalCenterTitle">Inicio de Sesión</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form id="LoginForm">
		      		<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="material-icons">account_circle</i></span>
					  </div>
					  <input type="text" id="Usertxt" class="form-control" placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon2"><i class="material-icons">lock</i></span>
					  </div>
					  <input type="password" id="PwdTxt" class="form-control" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon2">
					</div>
		      	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-primary" id="singin">Ingresar</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

	<div class="bg-dark" id="navbarHeader">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-md-7 py-4">
					<h4 class="text-white">¿Qué es ConectApp?</h4>
					<p class="text-white">ConectApp es un modo sencillo de conectar, aprender y generar ingresos extras con el potencial de los residuos y las cosas que ya no usas. Regístrate rápido y sigue los pasos para formar parte de una nueva ecónoma sostenible!</p>
				</div>
				<div class="col-sm-4 offset-md-1 py-4">
					<h4 class="text-white">Contacto</h4>
					<ul class="list-unstyled">
						<li style="margin-bottom: 5px;"><a href="https://twitter.com/ConectAppCol" target="_blank" class="text-white"><img src="img/twitter.png" style="width: 30px;"> @ConectAppCol - Twitter</a></li>
						<li style="margin-bottom: 5px;"><a href="https://www.facebook.com/Conectapp-299738160663570/" target="_blank" class="text-white"><img src="img/facebook.png" style="width: 30px;"> Conectapp - Facebook</a></li>
						<li><a href="https://instagram.com/conectapp.co?utm_source=ig_profile_share&igshid=1cmi0zdlfcmor" target="_blank" class="text-white"><img src="img/instagram.png" style="width: 30px;"> conectapp.co - Instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer page-footer font-small blue">

	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">
	  	© 2018 Copyright: sgonzalezm@unicesar.edu.co
	  </div>
	  <!-- Copyright -->

	</footer>

	<script type="text/javascript">
		function login() {
			if ($('#Usertxt').val() == "" || $('#PwdTxt').val() == "") {
				alert('Tiene un capo vacio');
			}else{
				$.ajax({
					url:'/User/SingIn',
					type:'POST',
					data:{email:$('#Usertxt').val(), password:$('#PwdTxt').val(), "_token": $('#token').val()},
					dataType:'json',
					success:function(argument) {
						if (argument.status) {
							redirec(argument.typeData);
						} else {
							alert('Las credenciales son incorrectas');
						}
					}
				});
			}
		}

		function redirec(argument) {
			if (argument == 'Persona') {
				window.location = '/Persona';
			}else{
				window.location = '/Punto';
			}
		}
		document.onkeypress = function(evt) {
		    evt = evt || window.event;
		    var charCode = evt.keyCode || evt.which;

		    if ( charCode == 13 && ($("#Usertxt").is(":focus") || $("#PwdTxt").is(":focus")) ) {
		    	login();
		    }
		};
		$(function() {
			$('#singin').click(function(){
				login();
			});
		});
	</script>
</body>
</html>