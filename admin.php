<?php

use AT\PageAdmin;
use AT\Model\User;
use AT\Model\Activity;
use AT\Model\Business;
use AT\Controller\Dashboard;

session_start();

$app->get("/admin", function(){

	User::verify_login();

	$dashboard = new Dashboard;

	$page = new PageAdmin(["footer" => false]);
	
	$page->setTpl("index", [
		"ractivities" => Activity::listAllRecents(),
		"dashboard"   => $dashboard->totUsers()
	]);

});

$app->get("/admin/login", function(){

	$page = new PageAdmin([
		"header" =>false,
		"footer" => false
	]);

	$page->setTpl("login");

});

$app->post("/admin/login", function(){
	$user = new User;

	$_POST["password"] = hash("md5", $_POST["password"]);

	$user->login($_POST['login'], $_POST['password']);

	header("Location: /admin");

	exit;
});

$app->get("/admin/logout", function(){

	User::logout();
	
	User::verify_login();

})

?>