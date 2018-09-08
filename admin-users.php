<?php
use AT\PageAdmin;
use AT\Model\User;
use AT\Model\Activity;

$app->get("/admin/users", function(){

	User::verify_login();

	$users = new User;

	$page = new PageAdmin();

	$page->setTpl("users", 
		["users" => $users->listAll()]);
});

$app->get("/admin/users/create", function(){

	User::verify_login();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});

$app->post("/admin/users/create", function(){

	User::verify_login();

	$user = new User;

	$_POST["inadmin"] = (isset($_POST["inadmin"])?1:0);

	$_POST["despassword"] = hash("md5", $_POST["despassword"]);

	$user->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],4,$user->getdesperson(),$user->getidperson());
	
	$user->save();

	header("Location: /admin/users");

	exit;
});

$app->get("/admin/users/:iduser/delete", function($iduser){

	User::verify_login();

	$user = new User;

	$user->get((int)$iduser);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],6,$user->getdesperson(),$user->getidperson());

	$user->delete();

	header("Location: /admin/users");

	exit;

});

$app->get("/admin/users/:iduser", function($iduser){

	User::verify_login();

	$user = new User;

	$page = new PageAdmin();

	$user->get((int)$iduser);

	$user->checkPhoto();


	$page->setTpl("users-update", array(
		"user" => $user->getValues()
	));


});

$app->post("/admin/users/:iduser", function($iduser){

	User::verify_login();
	
	$user = new User;

	$_POST["inadmin"] = (isset($_POST["inadmin"])?1:0);


	$user->get((int)$iduser);	

	if($_FILES["file"]["name"] != NULL){
		$user->setPhoto($_FILES["file"]);
	}

	$user->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],9,$user->getdesperson(),$user->getidperson());

	$user->update();

	header("Location: /admin/users");

	exit;

});


?>