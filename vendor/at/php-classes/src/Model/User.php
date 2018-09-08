<?php

namespace AT\Model;

use \AT\DB\Sql;
use \AT\Model;

class User extends Model{

	const SESSION = "User";

	public function login($user, $password){

		$sql = new Sql;
		
		$results = $sql->select("
			SELECT * FROM tb_users WHERE deslogin = :user", array(
			":user" => $user
		));

		if(!isset($results[0])){
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}

		$data = $results[0];

		if($password === $data["despassword"]){

			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;
		}else{
			throw new \Exception("Usuário inexistente ou senha inválida");
			
		}

	}

	public static function verify_login($inadmin = true){

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
		){
			header("Location: /admin/login");
			exit;
		}

	}

	public static function logout(){

		$_SESSION[User::SESSION] = NULL;

	}

	public function listAll(){

		$sql = new Sql;

		return $sql->select("SELECT b.desperson, b.desemail, a.deslogin, a.inadmin,a.iduser FROM tb_users a INNER JOIN tb_person b ON(a.idperson = b.idperson)");
	}

	public function save(){

		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save(:desperson, :desemail,:deslogin, :despassword, :nrphone, :inadmin)", array(
			":desperson"	=>$this->getdesperson(),
			":desemail"		=>$this->getdesemail(),
			":deslogin"		=>$this->getdeslogin(),
			":despassword"	=>$this->getdespassword(),
			":nrphone"		=>$this->getnrphone(),
			":inadmin"		=>$this->getinadmin()
			));

		$this->setData($results[0]);
	}

	public function update()
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
			":iduser"=>$this->getiduser(),
			":desperson"=>$this->getdesperson(),
			":deslogin"=>$this->getdeslogin(),
			":despassword"=>$this->getdespassword(),
			":desemail"=>$this->getdesemail(),
			":nrphone"=>$this->getnrphone(),
			":inadmin"=>$this->getinadmin()
		));

		$this->setData($results[0]);	
	}

	public function delete(){

		$sql = new Sql;

		$sql->query("CALL sp_users_delete(:iduser)", [":iduser" => $this->getiduser()]);

	}

	public function get($iduser){

		$sql = new Sql;

		$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_person b USING(idperson) WHERE a.iduser = :iduser", array(
			":iduser"=>$iduser
		));

		$this->setData($results[0]);
	}

public function checkPhoto()
	{
		if(file_exists(
			$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.
			"res".DIRECTORY_SEPARATOR.
			"site".DIRECTORY_SEPARATOR.
			"img".DIRECTORY_SEPARATOR.
			"user".DIRECTORY_SEPARATOR.
			"perfil".DIRECTORY_SEPARATOR.
			$this->getiduser().".jpg"))
		{
			$url = "/res/site/img/user/perfil/". $this->getiduser().".jpg";
			
		}else{
			$url = "/res/site/img/user/close.png";
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
			"user".DIRECTORY_SEPARATOR.
			"perfil".DIRECTORY_SEPARATOR.
			$this->getiduser().".jpg";

		imagejpeg($image,$dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

}


?>