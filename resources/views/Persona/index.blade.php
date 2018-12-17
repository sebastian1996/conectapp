<!DOCTYPE html>
<html>
<head>
	<title>ConectApp - Personas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icon_conectapp.jpg">

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
		<!-- <a class="nav-link active" href="#">Adquirir</a> -->
		<a class="nav-link" href="#" id="PublicarSide">Publicar</a>
		<div class="dropdown-divider"></div>
		<a class="nav-link" href="#" id="ContactoSide">Contactos</a>
		<div class="dropdown-divider"></div>
		<a class="nav-link" href="/User/SingOut">Salir</a>
		<div class="dropdown-divider"></div>
	</nav>

	<div class="row">
		<nav class="nav flex-column col-md-2" id="SidenavPc">
			<!-- <a class="nav-link active" href="#">Adquirir</a> -->
			<a class="nav-link" href="#" id="PublicarSide_">Publicar</a>
			<div class="dropdown-divider"></div>
			<a class="nav-link" href="#" id="ContactoSide_">Contactos</a>
			<div class="dropdown-divider"></div>
			<a class="nav-link" href="/User/SingOut">Salir</a>
			<div class="dropdown-divider"></div>
		</nav>

		<div class="col-12 col-md-9" id="adquirirView" style="display: none;">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>

		<div class="col-12 col-md-9" id="publicarView">
			<h1>Publicar Elementos</h1>

			<form id="myform">
				<div class="form-group">
					<label for="categoria_id">Categoria</label>
					<select class="form-control" id="categoria_id" name="categoria_id">
						
					</select>
				</div>

				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
					<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
				</div>

				<div class="form-group">
					<label for="descripcion">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
				</div>

				<div class="row">
					<div class="form-group col-12 col-md-6">
						<label for="cantidad">Cantidad</label>
						<input type="number" class="form-control" id="cantidad" name="cantidad">
					</div>

					<div class="form-group col-12 col-md-6">
						<label for="cantidad_id">Medida</label>
						<input type="text" class="form-control" id="cantidad_id" name="cantidad_id" placeholder="Kilogramo" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" class="form-control" id="imagen" name="imagen">
				</div>

				<div class="row justify-content-center">
					<img id="preview" class="img-fluid" src="" height="250" width="280" style="display: none;">
				</div>

				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				
				<div class="row">
					<canvas id="MyCanvas" height="250" width="280" style="display: none;"></canvas>	
				</div>

				<div class="row">
					<button type="button" id="Send" class="btn btn-primary">Enviar</button>
				</div>
			</form>
		</div>

		<div class="col-12 col-md-9" id="ContactoView" style="display: none;">
			<div class="card">
				<h1 class="card-header">Contactos recibidos</h1>
				<form class="container" id="ShowContactos">
					
				</form>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
	function mostrarVista(argument) {
		var vistas = ['#publicarView','#ContactoView'];
		for (var i = 0; i < vistas.length; i++) {
			if (vistas[i] == argument) {
				$(vistas[i]).css({'display':''});
			} else {
				$(vistas[i]).css({'display':'none'});
			} 	
		}
	}

	function buscar_acuerdos() {
		$.ajax({
			url:'/Acuerdo/Persona',
			type:'GET',
			success:function(argument) {
				console.log(argument);
				if (argument.length == 0) {
					$('#ShowContactos').attr('class','row justify-content-center');
					$('#ShowContactos').html('<p class="card-text"><i>No hay contactos recibidos</i></p>');
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
								    '<small><b>Persona:</b> '+argument[i].punto.nombre+' / <b>Dirección:</b> '+argument[i].punto.direccion+'</small>'+
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

	function cerrarAcuerdo(argument) {
		var data_ = {
				"acuerdo_id":argument,
				"_token": $('#token').val()
			};

			$.ajax({
				url:'/Acuerdo/PersonaCerrar',
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
		$('#PublicarSide').on('click', function() {
			mostrarVista('#publicarView');
		});

		$('#PublicarSide_').on('click', function() {
			mostrarVista('#publicarView');
		});

		$('#ContactoSide_').on('click', function() {
			buscar_acuerdos();
			mostrarVista('#ContactoView');
		});

		$('#ContactoSide').on('click', function() {
			buscar_acuerdos();
			mostrarVista('#ContactoView');
		});

		llenar_categorias();

		function llenar_categorias() {
			$.ajax({
				url:'/Categoria/All',
				type:'GET',
				success:function(argument) {
					var html_ = "";
					for (var i = 0; i < argument.length; i++) {
						html_+='<option value="'+argument[i].id+'">'+argument[i].nombre+'</option>';
					}
					$('#categoria_id').html(html_);
				}
			});
		}

		$('#imagen').on('change',function() {
			if (document.getElementById('imagen').files[0].type.split('/')[0] != 'image'){
				$("#imagen").val('');
				alert('Sólo se permiten imágenes');
			}else{
				var files = document.getElementById('imagen').files;
				if (files.length > 0) {
					var data = URL.createObjectURL(files[0]);
					$('#preview').attr('src', data);
					$('#preview').css({'display':''});
				}
			}
		})

		$('#Send').click(function() {
			if ( $('#categoria_id').val() == "" || $('#nombre').val() == "" || $('#descripcion').val() == "" || $('#cantidad').val() == "" || $('#imagen').val() == "" ) {
				alert('Un dato esta vacío, por favor compruebe');
			} else {
				var myCanvas = document.getElementById('MyCanvas');
			    var ctx = myCanvas.getContext('2d');
			    ctx.drawImage(document.getElementById("preview"), 0, 0, 280, 250);
			    var base64Str = myCanvas.toDataURL();

				var data_ = {
					nombre:$('#nombre').val(),
					descripcion:$('#descripcion').val(),
					cantidad:$('#cantidad').val(),
					precio:'0',
					estado:'Disponible',
					imagen:$('#imagen')[0].files[0].name,
					imagen64:base64Str,
					persona_id:'',
					categoria_id:$('#categoria_id').val(),
					cantidad_id:'1',
					"_token": $('#token').val()
				};

				$.ajax({
					url:'/Elemento',
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
		});

		function limpiar() {
			$('#preview').css({'display':'none'});
			$('#nombre').val('');
			$('#descripcion').val('');
			$('#cantidad').val('');
			$('#imagen').val('');
			llenar_categorias();
		}
	});
</script>
</html>
