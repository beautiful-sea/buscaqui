<?php


use AT\PageUserAdmin;
use AT\Model\Business;
use AT\Model\Category;


$app->get("/dashboard",function(){

	Business::verify_login();
	$clientlength = count(Business::listAllClients());

	$page = new PageUserAdmin(["footer" => false]);

	$page->setTpl("index",[
		"clients"	=>	$clientlength
	]);

});

$app->get("/clients",function(){

	Business::verify_login();

	$page = new PageUserAdmin();

	$page->setTpl("clients", ["clients" => Business::listAllClients()]);

});


$app->get("/clients/create",function(){

	Business::verify_login();

	$page = new PageUserAdmin();

	$page->setTpl("clients-create");

});

$app->post("/clients/create",function(){

	Business::verify_login();

	$business = new Business;

	$business->setData($_POST);

	$business->addClient();

	header("Location: /clients");
	exit;

});

$app->get("/clients/:idclient/delete",function($idclient){

	Business::verify_login();
	
	$business = new Business();

	$business->removeClient($idclient);

	header("Location: /clients");
	exit;
});

$app->get("/clients/:idclient",function($idclient){

	Business::verify_login();

	$client = Business::getClient($idclient);

	$page = new PageUserAdmin();

	$page->setTpl("clients-update", ["client"	=>	$client[0]]);

});

$app->post("/clients/:idclient",function($idclient){

	Business::verify_login();
	
	$business = new Business();

	$business->setData($_POST);

	$business->updateClient($idclient);

	header("Location: /clients");
	exit;
});

$app->get("/profile", function(){

	Business::verify_login();

	$business = new Business;
	$category = new Category;


	$business->get((int)$_SESSION[Business::SESSION]["idbusiness"]);

	$page = new PageUserAdmin();

	$page->setTpl("profile", ["business"	=>	$business->getValues(), "categories" => $category->listAll()]);

})
?>