<?php
require_once 'Database.php';
class Product {
	public $name;
	public $price;
	public $category;
	public $description;

	public function __construct($name, $price, $category, $description) {
      $this->name = $name;
			$this->price = $price;
	    $this->category = $category;
	    $this->description = $description;
  }

	// return rows
	public function save() {
		$db = new Database();
		$sql = "INSERT INTO
						 	producto(nombre, precio, categoria_id, descripcion)
					VALUES(
									'".$this->name."',
									$this->price,
									$this->category,
									'".$this->description."'
								)
					";
		$db->query($sql);
		$lastId = (int)$db->mysqli->insert_id;
		echo $lastId;
		$db->close();
		return true;
	}
	static function get() {
		$sql = " SELECT
		 						*
							FROM
								producto
						";
		$db = new Database();
		if($rows = $db->query($sql)) {
			return $rows;
		}
		return false;
	}

}
