<?php


namespace AT\Model;

use \AT\Db\Sql;
use \AT\Model;

class Lottery extends Model{

	public function __construct(){
		date_default_timezone_set('America/Sao_Paulo');
	}
	public function listAll(){

		$sql = new Sql;

		return $this->formatDate($sql->select("SELECT * FROM tb_lottery ORDER BY status DESC"));
	}

	public function addLottery($status = 0){//Criar sorteio
		$active = $this->getActive();

		$dtstart = $this->getdtstart()." ".$this->gethrstart().":00";
		$dtend = $this->getdtend()." ".$this->gethrend().":00";
		$sql = new Sql;

		if(!isset($active[0])){
			$status = 1;
		}

		$sql->query("
			INSERT INTO tb_lottery (dtstart, dtend,status) 
			VALUES (:dtstart, :dtend, :status)",[
				":dtstart"	=>	$dtstart,
				":dtend"	=> 	$dtend,
				":status"	=>	$status
			]);
	}

	public function deleteLottery($idlottery){//Deletar Sorteio

		$sql = new Sql;

		$sql->query("DELETE FROM tb_lottery WHERE idlottery = :idlottery",[":idlottery"=>$idlottery]);

		$this->newLottery($idlottery);
	} 

	public function updateLottery($idlottery){

		$dtstart = $this->getdtstart()." ".$this->gethrstart().":00";
		$dtend = $this->getdtend()." ".$this->gethrend().":00";
		$sql = new Sql;

		$sql = new Sql;

		$sql->query("UPDATE tb_lottery SET dtstart = :dtstart, dtend = :dtend, status = :status",[
			":dtstart"	=>	$dtstart,
			":dtend"	=> 	$dtend,
			":status"	=>	$this->getstatus()
		]);
	}

	public function get($idlottery){//Buscar sorteio específico

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM tb_lottery WHERE idlottery = :idlottery",[":idlottery"=>$idlottery]);

		$this->formatDate($results[0]);

	}

	public function getActive(){//Buscar sorteio ativo

		$sql = new Sql;

		return $this->formatDate($sql->select("SELECT * FROM tb_lottery WHERE status = 1"));

	}


	public function formatDate($date = array()){//Formatar datas do sorteio

		foreach ($date as $key => $value) {

			$newdtstart = strtotime($date[$key]["dtstart"]);

			$date[$key]["dtstart"] = date("d-m-Y H:i:s", $newdtstart);
			$date[$key]["dtend"] = date("d-m-Y H:i:s", strtotime($date[$key]["dtend"]));
			$date[$key]["dtregister"] = date("d-m-Y H:i:s", strtotime($date[$key]["dtend"]));
		}

		return $date;
	}

	public function returnDateTimeActive($active = array()){
	//Retorna ano,dia,mes,hora,minuto e segundo do sorteio ativo

		$active[0]["dtstart"] = str_replace(" ", "-", $active[0]["dtstart"]);

		$date = explode("-", $active[0]["dtstart"]);
		$time = explode(":", $date[3]);

		$date[0] = [
			"yy"=>$date[0],
			"mm"=>$date[1],
			"dd"=>$date[2],
			"hh"=>$time[0],
			"mi"=>$time[1],
			"ss"=>$time[2]
		];

		return $date[0];
	}

	public function getPAL(){//Retorna participantes do sorteio ativo

		$sql = new Sql;

		return $this->formatDate($sql->select("
			SELECT * FROM tb_lottery a 
			INNER JOIN tb_participants b ON(b.idlottery = a.idlottery)
			WHERE a.status = 1"));
	}

	public static function deletePAL($idparticipant){//Deleta participante do sorteio ativo

		$sql = new Sql;

		$sql->query("DELETE FROM tb_participants WHERE idparticipant = :idparticipant", 
			[":idparticipant" => $idparticipant]);
	}

	public function validateEndLottery(){

		$activeLottery = $this->getActive();

		if(isset($activeLottery[0])){

			if(strtotime($activeLottery[0]["dtend"]) <= strtotime(date("d-m-Y H:i:s"))){
			$this->newLottery($activeLottery[0]["idlottery"]);
			}

		}
	}

	public function newLottery($idlottery){

		$sql = new Sql;

		$sql->query("UPDATE tb_lottery SET status = 2 WHERE status = 1 AND idlottery = :idlottery",[
			":idlottery" => $idlottery
		]);

		$nextLottery = $sql->select("SELECT * FROM tb_lottery WHERE status = 0 ORDER BY dtstart LIMIT 1");

		if(isset($nextLottery[0])){
			$sql->query("UPDATE tb_lottery SET status = 1 WHERE idlottery = :idlottery",[
			":idlottery"	=>	$nextLottery[0]["idlottery"]
			]);
		}
		
	}
}




?>