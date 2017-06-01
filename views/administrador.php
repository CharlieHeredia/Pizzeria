<?php
session_start();
if ($_SESSION['logeadoNuevo'] == 'true') {

    echo '<script language="javascript">alert("Bienvenido ");</script>';
    $_SESSION['logeadoNuevo'] = 'false';
}else {
  if ($_SESSION['usuarioActivo'] == "") {
    echo '<script language="javascript">alert("Debe iniciar sesión ");</script>';
    header('Location: ../index.php');
  }
  //echo '<script language="javascript">alert("Debe iniciar sesion ");</script>';
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administración</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- my css file -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <script type="text/javascript">
    window.onunload = window.onbeforeunload = function(){
        return "Ud esta abandonando este sitio, su sesion se finalizara";

    };
</script>
  <script type="text/javascript" src="../assets/js/productos.js" ></script>

  </head>
  <body>
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
                <li><a href="#">Cuenta</a></li>
                <li><a href="#">Ayuda</a></li>
                <li><a href="#">Acerca de nosotros</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../index.php" onclick="cerrarSesion()" >Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Content Section -->
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Control de Productos</h2>
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_product_modal">Agregar Producto</button>
                <button class="btn btn-success" data-toggle="modal" data-target="#ver-grupo">Ver por Categoria</button>
                <button class="btn btn-success" onclick="readRecords()">Ver todos</button>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4>Productos registrados:</h4>
            <div class="records_content"></div>
        </div>
    </div>
    </div>

    <!-- Bootstrap Modal - Para añadir nuevo producto -->
    <!-- Modal -->
    <div class="modal fade" id="add_new_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Añadir Nuevo Producto</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                  <label for="name">Nombre del producto</label>
                  <input type="text" id="name" placeholder="Nombre del producto" class="form-control" />
              </div>

              <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" id="descripcion" placeholder="Descripción del producto" class="form-control"/>
              </div>

              <div class="form-group">
                  <label for="precio">Precio</label>
                  <input type="text" id="precio" placeholder="Precio del producto" class="form-control"/>
              </div>

              <div class="form-group">
                  <label for="categoria">Categoria ID</label>
                  <input type="number" id="categoria" placeholder="Categoria del producto" class="form-control"/>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" onclick="addProduct()">Añadir Producto</button>
          </div>
        </div>
      </div>
    </div>

    <!-- // Modal -->
    <div class="modal fade" id="ver-grupo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ver por Categoria</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categoria_solo">Categoria</label>
                        <input type="number" id="categoria-search" placeholder="Id de Categoria" class="form-control"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="readCategoria()" >Buscar Categoria</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Update Product details -->
    <div class="modal fade" id="update_product_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Actualizar</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Nombre del Producto</label>
                        <input type="text" id="name_update" placeholder="Nombre del Producto" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción del Producto</label>
                        <input type="text" id="descripcion_update" placeholder="Descripciòn del producto" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" id="precio_update" placeholder="Precio del producto" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="id-categoria">ID de Categoria</label>
                        <input type="number" id="id_categoria_update" placeholder="ID de Categoria" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="ActualizarDatosProducto()" >Guardar cambios</button>
                    <input type="hidden" id="hidden_id_producto">
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
