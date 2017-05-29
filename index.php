<?php
	include_once("controllers/ProductsController.php");
	include_once("controllers/AdministradorControllers.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Trattoria Don Lorenzo</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
  <body>
    <!-- header -->
    <header>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Trattoria Don Lorenzo</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
							<!-- Show modal body to sign up -->
              <li><a href="#" data-toggle="modal" data-target="#sign_up_modal"  >Administrador</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Más <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Contacto</a></li>
                  <li><a href="#">Ayuda</a></li>
                  <li><a href="#">Acerca de nosotros</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <div class="video-container">
      <video class="video" src="./public/video.mp4" autoplay loop="">
      </video>
    </div>

		<!-- Bootstrap Modal - To sign up -->
    <!-- Modal -->
    <div class="modal fade" id="sign_up_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Inicio de Sesión</h4>
			    </div>
			    <div class="modal-body">

			        <div class="form-group">
			            <label for="user">Usuario</label>
			            <input type="text" id="user" placeholder="Ingrese usuario" class="form-control"/>
			        </div>

			        <div class="form-group">
			            <label for="password">Password</label>
			            <input type="password" id="password" placeholder="Ingrese password" class="form-control"/>
			        </div>

			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			        <button type="button" class="btn btn-primary" id="ingresar_administrador">Ingresar</button>
			    </div>
		    </div>
	    </div>
    </div>

		<!-- script sign_up modal -->
		<script type="text/javascript" src="assets/js/administrador.js"></script>
		<script type="text/javascript">
			let ingresar_admin = document.querySelector("#ingresar_administrador");
			ingresar_admin.addEventListener('click',function(){
				//Datos de usuario y contraseña
				let usuario = document.querySelector("#user");
				let password = document.querySelector("#password");
				//Objeto de tipo administrador
				let admin = new administrador(0,"empty",usuario.value,password.value);
				let adminJSON = JSON.stringify(admin);
				$.ajax({
					method: "POST",
					url: "controllers/AdministradorControllers.php",
					data: { admin_datos: adminJSON , funcion:  "Inicio_Sesion" }
				})
				.done(function() {
				   console.log( "Datos enviados "+adminJSON+" : "+admin['usuario']);
				 });
			})

		</script>
		<!-- FORMULARIO PARA MOSTRAR LOS PRODUCTOS REGISTRADOS -->
		<div class="front absolute card col-xs-12">
			<select class="form-control" name="">
				<?php
					foreach ($productos as $producto) {
				?>
						<option value=""><?php echo $producto['nombre']; ?></option>
				<?php
					}
				?>
			</select>
		</div>
    <!-- FORMULARIO PARA INGRESAR PRODUCTOS -->
    <div class="video-container vertical-center">
      <div class="front absolute card col-xs-12">
        <h2 class ="white-text">Registrar nuevo producto</h2>
        <input type="text" class="form-control" id="nombre" value="" placeholder="Escribe el nombre del producto "><br>
        <input type="number" class="form-control" id="precio" value="" placeholder="Escribe el precio del producto "><br>
        <select id="categoria" class="form-control" name="">
					<option value="1">Pizzas</option>
					<option value="2">Pastas</option>
					<option value="3">Ensaladas</option>
        	<option value="4">Bebidas</option>
        </select><br>
				<textarea class="form-control" id="descripcion"></textarea>
				<br>

        <button type="button" class="form-control" id="guardar">Guardar producto</button>
      </div>
    </div>

    <!-- container -->
    <script src="./assets/js/script.js" charset="utf-8"></script>
    <script type="text/javascript">
      let guardar = document.querySelector("#guardar");
      guardar.addEventListener('click',function(){
        let nombre = document.querySelector("#nombre");
        let precio = document.querySelector("#precio");
				let categoria = document.querySelector("#categoria");
        let descripcion = document.querySelector("#descripcion");



        let producto = new Producto(nombre.value,precio.value,categoria.value,descripcion.value);
				let listaproductos = new Array();
				listaproductos.push(producto);
				let arregloJSON = JSON.stringify(listaproductos);
				console.log(arregloJSON);
				$.ajax({
				  method: "POST",
				  url: "controllers/ProductsController.php",
				  data: { productos: arregloJSON, funcion: "insertarProductos" }
				})
				.done(function() {
				   console.log( "Datos guardados ");
				 });
      });

    </script>
  </body>
</html>
