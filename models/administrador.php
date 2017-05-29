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

  static function Login($datos) {
		$sql = " SELECT
		 						usuario, contraseña
							FROM
								administrador
						";
		$db = new Database();

		if($rows = $db->query($sql)) {
      $row = mysql_fetch_array($rows);
      if($row['usuario'] == $datos['_usuario'] ){
          header('location: Acerto.php ');
      }else{
        //header('location: fallo.php ');
      }
		}
		return false;
	}
}
