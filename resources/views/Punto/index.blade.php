<!DOCTYPE html>
<html>
<head>
	<title>ConectApp - Punto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<style type="text/css">
		@media (max-width: 769px) {
			#SidenavPc{
				display: none;
			}
		}

		@media (min-width: 770px) {
			#buttonSidenav{
				display: none;
			}
		}
	</style>
</head>

<body>
	<header>
		<div class="navbar navbar-dark bg-dark shadow-sm">
			<div class="container d-flex justify-content-between">
				<a href="/Persona" class="navbar-brand d-flex align-items-center">
					<strong>ConectApp</strong>
				</a>
				<button class="navbar-toggler" id="buttonSidenav" type="button" data-toggle="collapse" data-target="#collapseExample" aria-controls="collapseExample" aria-expanded="false" aria-label="Toggle navigation">
					<i class="material-icons">contact_support</i>
				</button>
			</div>
		</div>
	</header>

	<nav class="nav collapse flex-column col" id="collapseExample">
		<a class="nav-link" href="#">Buscar</a>
		<a class="nav-link" href="#">Definir precios</a>
		<a class="nav-link" href="#">Salir</a>
	</nav>

	<div class="row">
		<nav class="nav flex-column col-md-2" id="SidenavPc">
			<a class="nav-link" href="#">Buscar</a>
			<a class="nav-link" href="#">Definir precios</a>
			<a class="nav-link" href="#">Salir</a>
		</nav>
	</div>
</body>

</html>