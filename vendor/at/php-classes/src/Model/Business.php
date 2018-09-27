<?php

namespace AT\Model;

use \AT\Db\Sql;
use \AT\Model;

class Business extends Model{

	public function listAll(){

		$sql = new Sql;

		return $sql->select("SELECT * FROM users  
            WHERE admin = 0 ORDER BY firstname");
	}

	public function save(){

		$sql = new Sql();

		$company = $sql->select("
			CALL save_company (:pname,:pmobile, :paddress, :pzipcode,:pcity, :pcountry,:pprovince,:pcnpj,:poffice_hours, :pfirstname, :plastname,:pemail,:phashed_password,:poffice,:pcpf,:prg,:prg_issuing)",[
		 	":pname" 		=> $this->getname(),
		 	":pmobile"       => $this->getmobile(),
		 	":paddress"		=> $this->getaddress(),
		 	":pzipcode"		=> $this->getzipcode(),
		 	":pcity" 		=> $this->getcity(),
		 	":pcountry" 		=> "Brasil",
		 	":pprovince"		=> $this->getprovince(),
		 	":pcnpj" 		=> $this->getcnpj(),
		 	":poffice_hours" => "00:00",
		 	":pfirstname" 		=> $this->getfirstname(),
		 	":plastname" 		=> $this->getlastname(),
		 	":pemail"      	 	=> $this->getemail(),
		 	":phashed_password"	=> $this->gethashed_password(),
		 	":poffice" 			=> $this->getoffice(),
		 	":pcpf" 				=> (string)$this->getcpf(),
		 	":prg" 				=> (string)$this->getrg(),
		 	":prg_issuing" 		=> $this->getrg_issuing()
		]);

		$this->setData($company[0]);
		
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

		$results = $sql->select("SELECT * FROM companies");

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

	public function hash_password($password)
	{
		$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
		$hash = hash('sha256', $salt . $password);
		
		return $salt . $hash;
	}
}
?>