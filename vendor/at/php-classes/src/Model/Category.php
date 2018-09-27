<?php

namespace AT\Model;

use \AT\Model;
use \AT\DB\Sql;

class Category extends Model{

	public function listAll(){

		$sql = new Sql;

		$all = $sql->select("SELECT * FROM categories order by name");

		for ($i=0; $i < count($all); $i++) { 
			# code...
		}
		return $all;

	}

	public function save(){

		$sql = new Sql;

		$results = $sql->select("CALL sp_categories_save(:idcategory, :descategory)",array(
			":idcategory" => $this->getidcategory(),
			":descategory"=> $this->getdescategory()
		));

		$this->setData($results[0]);
	}

	public function delete()
	{
		$sql = new Sql;

		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", 
			[":idcategory" => $this->getidcategory()]);
	}

	public function get($idcategory){

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", array(
			":idcategory" => $idcategory
		));

		$this->setData($results[0]);

	}	

	public function getSubcategory($related = true)
	{
		$sql = new Sql();

		if($related === true){
			return $sql->select("
				SELECT * FROM subcategories WHERE idcategory = :idcategory;",
				[':idcategory' => $this->getidcategory()]
			);

		}else{
			return $sql->select("
				SELECT * FROM tb_subcategories WHERE idsubcategory NOT IN(
				SELECT a.idsubcategory FROM tb_categoriessubcategories a
				INNER JOIN tb_subcategories b
				 WHERE a.idcategory = :idcategory OR a.idcategory <> :idcategory);",
				[':idcategory'=>$this->getidcategory(),
				':idcategory' =>$this->getidcategory()]
			);
		}
	}

	public function addSubcategoryToCategory($idcategory, $idsubcategory)
	{
		$sql = new Sql();

		$sql->query("
			INSERT INTO tb_categoriessubcategories(idcategory, idsubcategory)
			VALUES (:idcategory, :idsubcategory)",[
				":idcategory"=>$idcategory,
				":idsubcategory"=>$idsubcategory
			]);
	}

	public function removeSubcategoryToCategory($idcategory, $idsubcategory)
	{
		$sql = new Sql;

		$sql->query("
			DELETE FROM tb_categoriessubcategories 
			WHERE idcategory = :idcategory AND idsubcategory = :idsubcategory",
			[":idcategory" => $idcategory,
			":idsubcategory" => $idsubcategory]);
	}

	public function addCategoryToBusiness($idcategory, $idcompany){
		$sql = new Sql;
		$sql->query('INSERT INTO company_has_subcategory (idsubcategory,company_id) 
    					VALUES (:idsubcategory, :company_id);',[
    						":idsubcategory"	=> $idcategory,
    						":company_id"		=> $idcompany
    					]);
		echo $this->getid();
	}

}


?>
