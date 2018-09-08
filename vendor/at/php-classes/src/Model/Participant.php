<?php


namespace AT\Model;

use \AT\Db\Sql;
use \AT\Model;

class Participant extends Model{


	public function addParticipant(){

		$dataParticipant = Participant::getBrowserSOIP();
		$sql = new Sql;

		if($this->verifyRegisterParticipant($this->getnrcpfid()) === true){
			//Participante ja está registrado em algum sorteio? se sim:


			if($this->verifyParticipantToLottery($this->getnrcpfid(),$this->getidlottery()) === false){
			//Participante já está registrado nesse sorteio? se sim:
				echo 'oi';
				$results = $sql->select("CALL sp_participant_save(:idlottery, :nrcpfid)",[
					":idlottery"	=>	$this->getidlottery(),
					":nrcpfid"		=>	$this->getnrcpfid()
				]);

				$this->addParticipantToLottery($results[0]["nrcpfid"],$this->getidlottery());
			}  

		}else{//Participante ja está registrado em algum sorteio? se não:

		$sql->query("
			INSERT INTO tb_participants (desname,nrcpfid,desemail,nrwhatsapp,ip,browser,so, idlottery)
			VALUES (:desname, :nrcpfid, :desemail,:nrwhatsapp,:ip,:browser,:so, :idlottery)",[
				":desname"		=>	$this->getdesname(),
				":nrcpfid"		=>	$this->getnrcpfid(),
				":desemail"		=>	$this->getdesemail(),
				":nrwhatsapp"	=>	$this->getnrwhatsapp(),
				":ip"			=>	$dataParticipant["ip"],
				":browser"		=>	$dataParticipant["browser"],
				":so"			=>	$dataParticipant["so"],
				":idlottery"	=>	$this->getidlottery()
			]);

		$this->addParticipantToLottery($this->getnrcpfid(),$this->getidlottery());

		}
		
	}

	public function verifyRegisterParticipant($nrcpfid){
		//Verifica se o participante ja tem o cpf cadastrado no site

		$sql = new Sql;

		$result = $sql->select("SELECT * FROM tb_participants WHERE nrcpfid = :nrcpfid",[
			":nrcpfid"	=>	$this->getnrcpfid()
		]);

		if(!isset($result[0])){
			return false;
		}else{

			return true;
		}
	}

	public function addParticipantToLottery($nrcpfid, $idlottery){
	//Adiciona o participante e a loteria na tabela "tb_participantlottery"

		if($this->verifyParticipantToLottery($nrcpfid,$idlottery) === false){
			$sql = new Sql;
			$sql->query("
				INSERT INTO tb_participantlottery(nrcpfid, idlottery)
				VALUES (:nrcpfid, :idlottery)",[
					":nrcpfid"	=>	$nrcpfid,
					":idlottery"=>	$idlottery
			]);
			return true;
		}else{
			return false;
		}
		
	}

	public function verifyParticipantToLottery($nrcpfid,$idlottery){
		//Verifica se o participante ja esta cadastrado no sorteio atual

		$sql = new Sql;

		$results = $sql->select("
			SELECT * FROM tb_participantlottery
			 WHERE nrcpfid 	= :nrcpfid AND idlottery = :idlottery",[
			 	":nrcpfid"	=>	$nrcpfid,
			 	":idlottery"=> 	$idlottery
			 ]);
		if(!isset($results[0])){
			return false;
		}else{
			return true;
		}
	}



























	public static function getBrowserSOIP() {//Retorna navegador, SO e IP do usuário 
	    $ip = $_SERVER['REMOTE_ADDR'];

	    $u_agent = $_SERVER['HTTP_USER_AGENT'];
	    $bname = 'Unknown';
	    $platform = 'Unknown';
	    $version= "";

	    if (preg_match('/linux/i', $u_agent)) {
	        $platform = 'Linux';
	    }
	    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	        $platform = 'Mac';
	    }
	    elseif (preg_match('/windows|win32/i', $u_agent)) {
	        $platform = 'Windows';
	    }


	    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
	    {
	        $bname = 'Internet Explorer';
	        $ub = "MSIE";
	    }
	    elseif(preg_match('/Firefox/i',$u_agent))
	    {
	        $bname = 'Mozilla Firefox';
	        $ub = "Firefox";
	    }
	    elseif(preg_match('/Chrome/i',$u_agent))
	    {
	        $bname = 'Google Chrome';
	        $ub = "Chrome";
	    }
	    elseif(preg_match('/AppleWebKit/i',$u_agent))
	    {
	        $bname = 'AppleWebKit';
	        $ub = "Opera";
	    }
	    elseif(preg_match('/Safari/i',$u_agent))
	    {
	        $bname = 'Apple Safari';
	        $ub = "Safari";
	    }

	    elseif(preg_match('/Netscape/i',$u_agent))
	    {
	        $bname = 'Netscape';
	        $ub = "Netscape";
	    }

	    $known = array('Version', $ub, 'other');
	    $pattern = '#(?<browser>' . join('|', $known) .
	    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	    if (!preg_match_all($pattern, $u_agent, $matches)) {
	    }


	    $i = count($matches['browser']);
	    if ($i != 1) {
	        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
	            $version= $matches['version'][0];
	        }
	        else {
	            $version= $matches['version'][1];
	        }
	    }
	    else {
	        $version= $matches['version'][0];
	    }

	    // check if we have a number
	    if ($version==null || $version=="") {$version="?";}

	    $browser = array(
	            'userAgent' => $u_agent,
	            'name'      => $bname,
	            'version'   => $version,
	            'platform'  => $platform,
	            'pattern'    => $pattern
	    );

	    $navegador =  $browser['name'] . " " . $browser['version'];
	    $so = $browser['platform'];

	    $data = ["browser" => $navegador, "so" => $so,"ip" => $ip];

	    return $data;

	}
}




?>