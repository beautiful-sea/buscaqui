<?php

namespace AT\Model;

use \AT\Model;
use \AT\DB\Sql;

class Subcategory extends Model{

	public function listAll(){

		$sql = new Sql;

		return $sql->select("SELECT * FROM subcategories");

	}

	public function save()
	{

		$sql = new Sql;

		$results = $sql->select("CALL sp_subcategories_save(:idsubcategory, :dessubcategory)",array(
			":idsubcategory" => $this->getidsubcategory(),
			":dessubcategory"=> $this->getdessubcategory()
		));

		$this->setData($results[0]);
	}

	public function delete()
	{
		$sql = new Sql;

		$sql->query("CALL sp_subcategories_delete(:idsubcategory)",[
			":idsubcategory" => $this->getidsubcategory()
		]);
	}

	public function get($idsubcategory)
	{

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM tb_subcategories WHERE idsubcategory = :idsubcategory", array(
			":idsubcategory" => $idsubcategory
		));

		$this->setData($results[0]);

	}	
}


?>