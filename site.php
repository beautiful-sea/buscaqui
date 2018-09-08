<?php

use AT\Page;
use AT\Model\Category;
use AT\Model\Subcategory;
use AT\Model\Business;
use AT\Model\Participant;
use AT\Model\Lottery;

$app->get("/", function(){
	

	$page = new Page();
	

	$page->setTpl("index");

});

$app->get("/categories", function(){
	
	$page = new Page();
	$category = new Category;
	$subcategory = new Subcategory;

	$page->setTpl("categories", [
		"categories" => $category->listAll(),
		"subcategories"=> $subcategory->listAll()
	]);
});

$app->get("/cat:idcategory", function($idcategory){
	
	$page = new Page();
	$category = new Category;
	$business = new Business();

	$category->setid($idcategory);

	$business->getBusinessByCategory($idcategory);

	$page->setTpl("subcategories", [
		"subcategories"=> $category->getSubcategory(),
		"business"	   => $business->getValues()
	]);
});

$app->post("/login", function(){

	$business = new Business;

	$business->login($_POST["deslogin"], md5($_POST["despassword"]));

	header("Location: /profile");
	exit;

});

$app->get("/logout", function(){

	$business = new Business;

	$business->logout();

	header("Location: /");
	exit;

});

$app->get("/clientregister", function(){

	$page = new Page();

	$page->setTpl("clientregister");

});

$app->get("/lottery", function(){

	$page = new Page(["header"	=> false, "footer"	=> false]);
	$lottery = new Lottery;

	$active = $lottery->getActive();

	$date = $lottery->returnDateTimeActive($active);

	$page->setTpl("lottery",["lottery" => $date]);

});

$app->post("/registerparticipant", function(){

	$participant = new Participant;

	$participant->setData($_POST);

	$participant->addParticipant();

	header("Location: /?lottery=1");
	exit;

});




?>