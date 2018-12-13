<!DOCTYPE html>
<html>
<head>
	<title>ConectApp</title>
	<meta charset="utf-8">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<header>
		<div class="collapse bg-dark" id="navbarHeader">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-7 py-4">
						<h4 class="text-white">Acerca de.</h4>
						<p class="text-white">Con ConectApp podrás dar, vender o comprar tus elementos reciclables tales como cartón, papel, plástico y similares; encontrando con nuestra plataforma puntos de recolección u otras personas interesadas en adquirirlos.</p>
					</div>
					<div class="col-sm-4 offset-md-1 py-4">
						<h4 class="text-white">Contacto</h4>
						<ul class="list-unstyled">
							<li><a href="#" class="text-white"><img src="img/twitter.png" style="width: 30px;"> Twitter</a></li>
							<li><a href="#" class="text-white"><img src="img/facebook.png" style="width: 30px;"> Facebook</a></li>
							<li><a href="#" class="text-white"><img src="img/gmail.png" style="width: 30px;"> conect-app@gmail.com</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar navbar-dark bg-dark shadow-sm">
			<div class="container d-flex justify-content-between">
				<a href="#" class="navbar-brand d-flex align-items-center">
					<!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg> -->
					<strong>ConectApp</strong>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
					<!-- <span class="navbar-toggler-icon"></span> -->
					<i class="material-icons">contact_support</i>
				</button>
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row" style="margin-top: 50px;">
			<div class="col-md-6">
				<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
					<div class="card mb-4 shadow-sm">
						<img class="card-img-top" src="img/punto.jpg" title="Punto de recolección">
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

			<div class="col-md-6">
				<a href="#" data-toggle="modal" data-target="#exampleModalCenter">
					<div class="card mb-4 shadow-sm">
						<img class="card-img-top" src="img/personas.jpg" title="Personas">
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
		        <div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1"><i class="material-icons">account_circle</i></span>
				  </div>
				  <input type="text" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1">
				</div>

				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon2"><i class="material-icons">lock</i></span>
				  </div>
				  <input type="text" class="form-control" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon2">
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-primary">Ingresar</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>