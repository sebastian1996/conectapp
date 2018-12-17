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
		<div class="navbar shadow-sm" style="background-color: green;">
			<div class="container d-flex justify-content-between">
				<a href="/Persona" class="navbar-brand d-flex align-items-center">
					<img src="/img/icon_conectapp.jpg" style="height: 30px;border-radius: 50%;">
					<strong style="margin-left: 10px;color: white;">ConectApp</strong>
				</a>
				<button class="navbar-toggler" id="buttonSidenav" type="button" data-toggle="collapse" data-target="#collapseExample" aria-controls="collapseExample" aria-expanded="false" aria-label="Toggle navigation">
					<i class="material-icons" style="color: white;">contact_support</i>
				</button>
			</div>
		</div>
	</header>

	<nav class="nav collapse flex-column col" id="collapseExample">
		<a class="nav-link" href="#" id="BuscarSide">Buscar</a>
		<div class="dropdown-divider"></div>
		<a class="nav-link" href="#" id="DefinirSide">Definir precios</a>
		<div class="dropdown-divider"></div>
		<a class="nav-link" href="#" id="ContactoSide">Contactos</a>
		<div class="dropdown-divider"></div>
		<a class="nav-link" href="#" id="AcuerdoSide">Acuerdos</a>
		<div class="dropdown-divider"></div>
		<a class="nav-link" href="/User/SingOut">Salir</a>
		<div class="dropdown-divider"></div>
	</nav>

	<div class="row">
		<nav class="nav flex-column col-md-2" id="SidenavPc">
			<a class="nav-link" href="#" id="BuscarSide_">Buscar</a>
			<div class="dropdown-divider"></div>
			<a class="nav-link" href="#" id="DefinirSide_">Definir precios</a>
			<div class="dropdown-divider"></div>
			<a class="nav-link" href="#" id="ContactoSide_">Contactos</a>
			<div class="dropdown-divider"></div>
			<a class="nav-link" href="#" id="AcuerdoSide_">Acuerdos</a>
			<div class="dropdown-divider"></div>
			<a class="nav-link" href="/User/SingOut">Salir</a>
			<div class="dropdown-divider"></div>
		</nav>

		<div class="col-12 col-md-9" id="BuscarView" style="display: none;">
			<div class="card">
				<h1 class="card-header">Elementos disponibles</h1>
				<div class="card-body">
					<div class="row" id="ShowElementos">
						
					</div>					
				</div>
			</div>
		</div>

		<div class="col-12 col-md-9" id="DefinirView" style="display: none;">
			<div class="card">
				<h1 class="card-header">Precios en categorias</h1>
				<form class="container" id="ShowCategoriasPunto">
					
				</form>
			</div>
		</div>

		<div class="col-12 col-md-9" id="ContactoView" style="display: none;">
			<div class="card">
				<h1 class="card-header">Contactos realizados</h1>
				<form class="container" id="ShowContactos">
					
				</form>
			</div>
		</div>

		<div class="col-12 col-md-9" id="AcuerdoView" style="display: none;">
			<div class="card">
				<h1 class="card-header">Acuerdos realizados</h1>
				<form class="container" id="ShowAcuerdos">
					
				</form>
			</div>
		</div>
	</div>
	<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

</body>

<script type="text/javascript">
	function buscar_elementos_disponibles() {
			$.ajax({
				url:'/Elemento/Disponibles',
				type:'GET',
				success:function(argument) {
					if (argument.length == 0) {
						$('#ShowElementos').attr('class','row justify-content-center');
						$('#ShowElementos').html('<p class="card-text"><i>No hay elementos disponibles</i></p>');
					} else {
						var html_ = "";
						for (var i = 0; i < argument.length; i++) {
							html_+=''+
							'<div class="col-12 col-md-6" style="margin-bottom: 10px;">'+
							'<div class="card" style="width: 18rem;">'+
							'<img class="card-img-top" src="img/elementos/'+argument[i].imagen+'" alt="Card image cap">'+
							'<div class="card-body">'+
							'<h4 class="card-title">'+argument[i].nombre+'</h4>'+
							'<p class="card-text"><b>Descripción:</b> '+argument[i].descripcion+'</p>'+
							'<p class="card-text"><b>Cantidad:</b> '+argument[i].cantidad+' '+argument[i].cantidad_.nombre+'</p>'+
							'<div class="dropdown-divider"></div>'+
							'<p class="card-text"><b>Propietario:</b> '+argument[i].persona.nombres+'</p>'+
							'<p class="card-text"><b>Dirección:</b> '+argument[i].persona.direccion+'</p>'+
							'<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="contacto('+argument[i].id+');">Contactar</a>'+
							'</div>'+
							'</div>'+
							'</div>';
						}

						$('#ShowElementos').html(html_);
					}
				}
			});
		}

	function enviar_precios(){
		var ban = true;
		for (var i = 0; i < $('#ShowCategoriasPunto')[0].length - 1; i++) {
			if ($('#'+$('#ShowCategoriasPunto')[0][i].id).val() == "") {
				alert('Tiene un campo vacio, por favor compruebe');
				ban=false;
				break;
			}
		}

		if (ban) {
			var array = [];
			for (var i = 0; i < $('#ShowCategoriasPunto')[0].length - 1; i++) {
				array.push($('#ShowCategoriasPunto')[0][i].id+"-"+$('#'+$('#ShowCategoriasPunto')[0][i].id).val());
			}

			var data_ = {
				"data":array,
				"_token": $('#token').val()
			};

			$.ajax({
				url:'/Punto/Categorias',
				type:'POST',
				data:data_,
				dataType:'json',
				success:function(argument) {
					if (argument.status) {
						limpiar();
					}
					alert(argument.msg);
				}
			});
		}
	}

	function limpiar(){
		buscar_categorias();
	}

	function buscar_categorias() {
		$.ajax({
			url:'/Categoria/Punto',
			type:'GET',
			success:function(argument) {	
				if (argument.length == 0) {
					$('#ShowCategoriasPunto').attr('class','row justify-content-center');
					$('#ShowCategoriasPunto').html('<p class="card-text"><i>No hay categorias disponibles</i></p>');
				} else {
					var html_ = "";
					for (var i = 0; i < argument.length; i++) {
						html_+= '<div class="form-group">'+
									'<label for="Campo">'+argument[i].nombre+' ($)</label>'+
									'<input type="number" class="form-control" id="Campo'+argument[i].id+'" value="'+argument[i].precio+'">'+
								'</div>';
					}

					html_+= '<button type="button" id="sendPrecios" class="btn btn-primary"'+ 
								'style="margin-bottom: 20px;" onclick="enviar_precios();">'+
								'Actualizar'+
							'</button>';

					$('#ShowCategoriasPunto').html(html_);
				}
			}
		});
	}

	function contacto(elemento_id){
		var ban = confirm('¿Seguro desea enviar el contacto?');
		if (ban) {
			var data_ = {
				"elemento_id":elemento_id,
				"_token": $('#token').val()
			};

			$.ajax({
				url:'/Acuerdo',
				type:'POST',
				data:data_,
				dataType:'json',
				success:function(argument) {
					if (argument.status) {
						buscar_elementos_disponibles();
					}
					alert(argument.msg);
				}
			});
		}
	}

	function buscar_acuerdos() {
		$.ajax({
			url:'/Acuerdo/Punto',
			type:'GET',
			success:function(argument) {
				if (argument.length == 0) {
					$('#ShowContactos').attr('class','row justify-content-center');
					$('#ShowContactos').html('<p class="card-text"><i>No hay contactos realizados</i></p>');
				} else {
					var html_ = "";
					for (var i = 0; i < argument.length; i++) {
						html_+= '<div class="list-group" style="margin: 10px 0px;">'+
								  '<div class="list-group-item list-group-item-action flex-column align-items-start">'+
								    '<div class="d-flex w-100 justify-content-between">'+
								      '<h5 class="mb-1">'+argument[i].elemento.nombre+' - $'+argument[i].precio+'</h5>'+
								      '<small>'+argument[i].elemento.estado+'</small>'+
								    '</div>'+
								    '<div class="d-flex w-100 justify-content-between"><img class="card-img-top" src="img/elementos/'+argument[i].elemento.imagen+'" alt="Card image cap" style="height:100px;width:130px;"></div>'+
								    '<p class="mb-1">'+argument[i].elemento.descripcion+'</p>'+
								    '<small><b>Persona:</b> '+argument[i].persona.nombres+' / <b>Dirección:</b> '+argument[i].persona.direccion+'</small>'+
								    '<div class="d-flex w-100 justify-content-between">'+
									    '<button type="button" class="btn btn-primary"'+ 
											'style="margin-top: 10px;" onclick="cerrarAcuerdo('+argument[i].id+');">'+
											'Cerrar Acuerdo'+
										'</button>'+
									'</div>'+
								  '</div>'+
								'</div>';
					}

					$('#ShowContactos').html(html_);
				}
			}
		});
	}

	function buscar_acuerdos_realizados() {
		$.ajax({
			url:'/Acuerdo/Punto/Realizados',
			type:'GET',
			success:function(argument) {
				if (argument.length == 0) {
					$('#ShowAcuerdos').attr('class','row justify-content-center');
					$('#ShowAcuerdos').html('<p class="card-text"><i>No hay contactos realizados</i></p>');
				} else {
					var html_ = "";
					for (var i = 0; i < argument.length; i++) {
						html_+= '<div class="list-group" style="margin: 10px 0px;">'+
								  '<div class="list-group-item list-group-item-action flex-column align-items-start">'+
								    '<div class="d-flex w-100 justify-content-between">'+
								      '<h5 class="mb-1">'+argument[i].elemento.nombre+' - $'+argument[i].precio+'</h5>'+
								      '<small>'+argument[i].elemento.estado+'</small>'+
								    '</div>'+
								    '<div class="d-flex w-100 justify-content-between"><img class="card-img-top" src="img/elementos/'+argument[i].elemento.imagen+'" alt="Card image cap" style="height:100px;width:130px;"></div>'+
								    '<p class="mb-1">'+argument[i].elemento.descripcion+'</p>'+
								    '<small><b>Persona:</b> '+argument[i].persona.nombres+' / <b>Dirección:</b> '+argument[i].persona.direccion+'</small>'+
								  '</div>'+
								'</div>';
					}

					$('#ShowAcuerdos').html(html_);
				}
			}
		});
	}

	function cerrarAcuerdo(argument) {
		var data_ = {
				"acuerdo_id":argument,
				"_token": $('#token').val()
			};

			$.ajax({
				url:'/Acuerdo/PuntoCerrar',
				type:'POST',
				data:data_,
				dataType:'json',
				success:function(argument) {
					if (argument.status) {
						buscar_acuerdos();
					}
					alert(argument.msg);
				}
			});
	}

	$(function() {
		buscar_elementos_disponibles();

		mostrarVista('#BuscarView');

		$('#BuscarSide').on('click', function() {
			buscar_elementos_disponibles();
			mostrarVista('#BuscarView');
		});

		$('#BuscarSide_').on('click', function() {
			buscar_elementos_disponibles();
			mostrarVista('#BuscarView');
		});

		$('#DefinirSide').on('click', function() {
			buscar_categorias();
			mostrarVista('#DefinirView');
		});

		$('#DefinirSide_').on('click', function() {
			buscar_categorias();
			mostrarVista('#DefinirView');
		});

		$('#ContactoSide').on('click', function() {
			buscar_acuerdos();
			mostrarVista('#ContactoView');
		});

		$('#ContactoSide_').on('click', function() {
			buscar_acuerdos();
			mostrarVista('#ContactoView');
		});

		$('#AcuerdoSide').on('click', function() {
			buscar_acuerdos_realizados();
			mostrarVista('#AcuerdoView');
		});

		$('#AcuerdoSide_').on('click', function() {
			buscar_acuerdos_realizados();
			mostrarVista('#AcuerdoView');
		});

		function mostrarVista(argument) {
			var vistas = ['#BuscarView', '#DefinirView','#ContactoView','#AcuerdoView'];
			for (var i = 0; i < vistas.length; i++) {
				if (vistas[i] == argument) {
					$(vistas[i]).css({'display':''});
				} else {
					$(vistas[i]).css({'display':'none'});
				} 	
			}
		}
	});
</script>

</html>