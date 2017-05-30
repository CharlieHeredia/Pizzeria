<?php
session_start();
require_once ("../models/administrador.php");
require_once("../models/Cleaner.php");

$usuario = $_POST['user'];
$pass = $_POST['password'];
$resultado = Admon::Login($usuario,$pass);
if ($resultado == TRUE){
    $_SESSION['logeadoNuevo'] = 'true';
    $_SESSION['usuarioActivo'] = $usuario;
    header('Location: ../views/administrador.php');

}else {
    header('Location: ../index.php');
}
