<?php

namespace AT\Model;

use\AT\DB\Sql;
use \AT\Model;

class Activity extends Model{


	public function listAll(){
		$sql = new Sql;

		return $sql->select("SELECT * FROM tb_activities ORDER BY desactivity"); 
	}

	public static function listAllRecents()
	{
		$sql = new Sql;

		$results =  $sql->select("SELECT c.desperson,c.idperson, b.desactivity, a.destype,a.dtregister,a.idtype FROM tb_recent_activities a INNER JOIN tb_activities b ON(b.id = a.idactivity) INNER JOIN tb_person c ON(c.idperson = a.iduser) ORDER BY dtregister DESC LIMIT 6");

		return $results;
	}

	public function save()
	{
		$sql = new sql;

		$sql->query("CALL sp_activity_save(:id, :desactivity)",[
			":desactivity" => $this->getdesactivity(),
			":id"  => $this->getid()]);
	}

	public function get($id)
	{
		$sql = new Sql;

		$results = $sql->select("SELECT * FROM tb_activities WHERE id = :id",[
			":id" => $id]);

		$this->setData($results[0]);
	}

	public function delete()
	{
		$sql = new Sql;

		$sql->query("DELETE FROM tb_activities WHERE id = :id",
			[":id" => $this->getid()]);
	}

	public static function addRecentActivity($iduser, $idactivity, $destype,$idtype)
	{
		$sql = new Sql();

		$sql->query("INSERT INTO tb_recent_activities(iduser, idactivity, destype,idtype)
				VALUES (:iduser, :idactivity,:destype,:idtype)",
				[":iduser"=> $iduser,
				 ":idactivity" => $idactivity,
				 ":destype" => $destype,
				 ":idtype" => $idtype]);
	}

	public static function getRecentActivity()
	{

	}
}

?>