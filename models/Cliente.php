<?php
require_once 'Database.php';
class Client {
	public $name;
	public $phone;
	public $address;

	public function __construct($name, $address, $phone) {
      $this->name = $name;
			$this->phone = $phone;
	    $this->address = $address;
  }

	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
						 	cliente(nombre, direccion, telefono)
					VALUES(
									'".$this->name."',
									'".$this->address."',
									'".$this->phone."'
								)
					";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo "Dentro de Cliente.php: $this->name, $this->address, $this->phone ";
		echo $lastId;
		$db->close();
		return true;
	}
	static function get() {
		$sql = " SELECT
		 						*
							FROM
								cliente
						";
		$db = new Database();
		if($rows = $db->query($sql)) {
			return $rows;
		}
		return false;
	}

}
