<?php

namespace AT;

use Rain\Tpl;
use \AT\Model\Activity;
use \AT\Model\User;
use \AT\Model\Category;
use \AT\Model\Business;

class Page{

	private $tpl;

	private $defaults 	= array(	//configurações padrões
		"data" 		=> [],
		"header"	=> true,
		"footer"	=> true,
		"activities"=> false,
		"logged" 	=> false,
		"menucat"   => true,
		"admin"		=> false);
	private $options = [];

	public function __construct($opts = array(), $tpl_dir = "/views/"){
		

		$this->options = array_merge($this->defaults, $opts);
		// config
		$config = array(
						"tpl_dir"       => $_SERVER['DOCUMENT_ROOT'].$tpl_dir,
						"cache_dir"     => $_SERVER['DOCUMENT_ROOT']."/views-cache/",
						"debug"         => false // set to false to improve the speed
					   );

		Tpl::configure( $config );

		// criando objeto Tpl
		$this->tpl = new Tpl;

		if($this->options["menucat"] ===  true){
			$category = new Category();

			$this->options["data"] = $category->listAll();
		}

		if($this->options["header"] === true)
		{
			$this->setTpl("header",["categories"=>$this->options["data"]]);
		}
	}


	public function setData($data = array()){
		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}
	}

	public function setTpl($name, $data = array(), $returnHTML = false){

		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);
	}

	public function __destruct(){
		if($this->options["footer"] === true){
			$this->tpl->draw("footer");
		}
	}



}	

?>