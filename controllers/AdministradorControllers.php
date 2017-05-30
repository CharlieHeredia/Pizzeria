<?php
session_start();
if (isset($_POST['funcion'])) {

  require_once ("../models/administrador.php");
  require_once("../models/Cleaner.php");
  //Función para iniciar sesión

  if ($_POST['funcion']=='Inicio_Sesion') {

    //$administrador = json_decode($_POST['admin_datos']);
    //DEVUELVE TRUE O FALSE
    $usuario = $_POST['user'];
    $pass = $_POST['password'];
    //$usuario = $administrador->{'_usuario'};
    //$pass = $administrador->{'_password'};
    $resultado = Admon::Login($usuario,$pass);
    if ($resultado == TRUE){
        header('Location: masd.php');

    }else {
        header('Location: malllllll.php');
    }
    //Verificar valor de $rows
  }else {

  }


}else {

}
