<?php
require_once 'Database.php';
class Admon {
  public $id;
  public $nombre;
  public $usuario;
  public $password;

  public function __construct($id,$nombre,$usuario,$password){
    $this->id = $id;
    $this->nombre = $nombre;
    $this->usuario = $usuario;
    $this->password = $password;
  }

  static function Login($usuario,$pass) {
      $db = new Database();
  		$sql = " SELECT * FROM administrador WHERE usuario='$usuario' AND password='$pass'  ";
  		if($rows = $db->query($sql)) {
          return true;
        }else{
          return false;
        }
		}
}
