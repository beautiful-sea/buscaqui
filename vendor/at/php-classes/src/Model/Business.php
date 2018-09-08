<?php

namespace AT\Model;

use \AT\Db\Sql;
use \AT\Model;

class Business extends Model{
	

	const SESSION = 'Business';

	public function listAll(){

		$sql = new Sql;

		return $sql->select("SELECT * FROM users  
            WHERE admin = 0 ORDER BY firstname");
	}

	public function login($deslogin, $password){

		$sql = new Sql;
		
		$results = $sql->select("
			SELECT * FROM tb_business a 
			INNER JOIN tb_addresses b ON( b.idbusiness = a.idbusiness)
			INNER JOIN tb_contact c ON(c.idbusiness = a.idbusiness)
			WHERE a.deslogin = :deslogin", array(
			":deslogin" => $deslogin
		));

		if(!isset($results[0])){
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}

		$data = $results[0];

		if($password === $data["despassword"]){

			$business = new Business();

			$business->setData($data);

			$_SESSION[Business::SESSION] = $business->getValues();

			return $business;
		}else{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}

	}

	public static function verify_login(){

		if (
			!isset($_SESSION[Business::SESSION])
			||
			!$_SESSION[Business::SESSION]
			||
			!(int)$_SESSION[Business::SESSION]["idbusiness"] > 0
		){
			header("Location: /");
			exit;
		}

	}

	public static function logout(){

		$_SESSION[Business::SESSION] = NULL;

	}

	public function save(){

		$sql = new Sql();

		$dessubcategory = intval($this->getdessubcategory());
		 $sql->query("CALL sp_business_save(:desbusiness, :nrcnpj_cpf, :nrphone, :nrwhatsapp,:desemail ,:desaddress ,:desneighborhood ,:descity ,:desstate ,:nrzipcode ,:deslogin, :despassword,:dessubcategory)", array(
			":desbusiness"		=>$this->getdesbusiness(),
			":nrcnpj_cpf"		=>$this->getnrcnpj_cpf(),
			":nrphone"			=>$this->getnrphone(),
			":nrwhatsapp"		=>$this->getnrwhatsapp(),
			":desemail"			=>$this->getdesemail(),
			":desaddress"		=>$this->getdesaddress(),
			":desneighborhood"	=>$this->getdesneighborhood(),
			":descity"			=>$this->getdescity(),
			":desstate"			=>$this->getdesstate(),
			":nrzipcode"		=>$this->getnrzipcode(),
			":deslogin"			=>$this->getdeslogin(),
			":despassword" 		=>$this->getdespassword(),
			":dessubcategory"	=>$dessubcategory
			));
	}

	public function update()
	{
		$sql = new Sql();

		$sql->query("CALL sp_business_update(:idbusiness, :desbusiness, :nrcnpj_cpf, :nrphone, :nrwhatsapp,:desemail ,:desaddress ,:desneighborhood ,:descity ,:desstate ,:nrzipcode ,:deslogin)", array(
			":idbusiness"		=>intval($this->getidbusiness()),
			":desbusiness"		=>$this->getdesbusiness(),
			":nrcnpj_cpf"		=>$this->getnrcnpj_cpf(),
			":nrphone"			=>intval($this->getnrphone()),
			":nrwhatsapp"		=>intval($this->getnrwhatsapp()),
			":desemail"			=>$this->getdesemail(),
			":desaddress"		=>$this->getdesaddress(),
			":desneighborhood"	=>$this->getdesneighborhood(),
			":descity"			=>$this->getdescity(),
			":desstate"			=>$this->getdesstate(),
			":nrzipcode"		=>intval($this->getnrzipcode()),
			":deslogin"			=>$this->getdeslogin()
			));	
	}

	public function delete(){

		$sql = new Sql;

		$sql->query("DELETE FROM tb_business WHERE idbusiness = :idbusiness",[
			":idbusiness"=>$this->getidbusiness()
		]);

	}

	public function get($idbusiness){

		$sql = new Sql;

		$results = $sql->select("SELECT a.idbusiness, a.desbusiness, a.nrcnpj_cpf, a.idsubcategory,d.dessubcategory,a.deslogin,a.despassword, a.dtregister, a.desdescribe, b.desaddress,b.desneighborhood,b.descity,b.desstate,b.nrzipcode,c.nrphone,c.nrwhatsapp,c.desemail FROM tb_business a
			INNER JOIN tb_addresses b
			INNER JOIN tb_contact c 
			INNER JOIN tb_subcategories d ON(d.idsubcategory = a.idsubcategory) WHERE a.idbusiness = :idbusiness", array(
			":idbusiness"=>$idbusiness
		));

		$this->setData($results[0]);
	}

	public function getBusinessByCategory($idcategory)
	{
		$sql = new Sql;

		$results = $sql->select("SELECT * FROM");

		$this->setData($results);
	}

	public function checkPhoto()
	{
		if(file_exists(
			$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.
			"res".DIRECTORY_SEPARATOR.
			"site".DIRECTORY_SEPARATOR.
			"img".DIRECTORY_SEPARATOR.
			"business".DIRECTORY_SEPARATOR.
			"perfil".DIRECTORY_SEPARATOR.
			$this->getidbusiness().".jpg"))
		{
			$url = "/res/site/img/business/perfil/". $this->getidbusiness().".jpg";
		}else{
			$url = "/res/site/img/business/close.png";
		}

		return $this->setdesphoto($url);
	}

	public function setPhoto($file)
	{
		$extension = explode('.', $file["name"]);
		$extension = end($extension);

		switch ($extension) {
			case 'jpg':
			case 'jpeg':
				$image = imagecreatefromjpeg($file['tmp_name']);
				break;

			case 'gif':
				$image = imagecreatefromgif($file['tmp_name']);
				break;

			case 'png':
				$image = imagecreatefrompng($file['tmp_name']);
				break;
		}
		$dist = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.
			"res".DIRECTORY_SEPARATOR.
			"site".DIRECTORY_SEPARATOR.
			"img".DIRECTORY_SEPARATOR.
			"business".DIRECTORY_SEPARATOR.
			"perfil".DIRECTORY_SEPARATOR.
			$this->getidbusiness().".jpg";

		imagejpeg($image,$dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

	public function addClient(){

		$sql = new Sql;

		return $sql->query("CALL sp_clients_save(:desclient, :desaddress, :desemail, :nrwhatsapp, :nrphone, :idbusiness)",[
			":desclient"	=>$this->getdesclient(),
			":desaddress"	=>$this->getdesaddress(),
			":desemail"		=>$this->getdesemail(),
			":nrwhatsapp"	=>(int)$this->getnrwhatsapp(),
			":nrphone"		=>(int)$this->getnrphone(),
			":idbusiness"	=>$_SESSION[Business::SESSION]["idbusiness"]
		]);
	}

	public function updateClient($idclient){

		$sql = new Sql; 

		$sql->query("UPDATE tb_clients SET desclient = :desclient, desaddress = :desaddress, desemail = :desemail, nrwhatsapp = :nrwhatsapp, nrphone = :nrphone WHERE idclient = :idclient", [
			":desclient"	=>$this->getdesclient(),
			":desaddress"	=>$this->getdesaddress(),
			":desemail"		=>$this->getdesemail(),
			":nrwhatsapp"	=>$this->getnrwhatsapp(),
			":nrphone"		=>$this->getnrphone(),
			":idclient"		=>$idclient
		]);
	}

	public function removeClient($idclient){

		$sql = new Sql;

		$sql->query("DELETE FROM tb_clients WHERE idclient = :idclient",["idclient"	=> $idclient]);
	}

	public static function listAllClients(){

		$sql = new Sql;

		return $sql->select("
			SELECT * FROM tb_clients a
			INNER JOIN tb_clientsbusiness b ON(b.idbusiness = idbusiness)
			WHERE idbusiness = :idbusiness  AND a.idclient = b.idclient",[
				":idbusiness" => $_SESSION[Business::SESSION]["idbusiness"]
			]);
	}

	public static function getClient($idclient){

		$sql = new Sql;

		return $sql->select("SELECT * FROM tb_clients WHERE idclient = :idclient", ["idclient"	=>	$idclient]);
	}

}
?>