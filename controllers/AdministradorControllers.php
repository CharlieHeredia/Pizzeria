<?php

if (isset($_POST['funcion'])) {

  require_once ("../models/administrador.php");
  require_once("../models/Cleaner.php");
  //Función para iniciar sesión

  if ($_POST['funcion']=='Inicio_Sesion') {

    $administradorAlmacenado = new Admon(0,"","","");

    $administrador = $_POST['admin_datos'];
    //DEVUELVE TRUE O FALSE

    $resul = $administradorAlmacenado::Login($administrador);


  }


}else {

}
