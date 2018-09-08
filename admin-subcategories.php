<?php

use AT\PageAdmin;
use AT\Model\Category;
use AT\Model\Subcategory;
use AT\Model\User;
use AT\Model\Activity;

$app->get("/admin/subcategories", function(){

	User::verify_login();

	$subcategory = new Subcategory;

	$page = new PageAdmin;

	$page->setTpl("subcategories", [
		"subcategories" => $subcategory->listAll()]
	);
});

$app->get("/admin/subcategories/create", function(){

	User::verify_login();

	$page = new PageAdmin;

	$page->setTpl("subcategories-create");
});

$app->post("/admin/subcategories/create", function(){

	User::verify_login();

	$subcategory = new Subcategory;

	$subcategory->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],8,$subcategory->getdessubcategory(),$subcategory->getidsubcategory());
	
	$subcategory->save();

	header("Location: /admin/subcategories");
	exit;
});

$app->get("/admin/subcategories/:idsubcategory/delete", function($idsubcategory){

	User::verify_login();

	$subcategory = new Subcategory;

	$subcategory->get((int)$idsubcategory);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],19,$subcategory->getdessubcategory(), $subcategory->getidsubcategory());

	$subcategory->delete();


	header("Location: /admin/subcategories");
	exit;

});

$app->get("/admin/subcategories/:idsubcategory", function($idsubcategory){

	User::verify_login();

	$page = new PageAdmin;

	$subcategory = new Subcategory;

	$subcategory->get((int)$idsubcategory);

	$page->setTpl("subcategories-update", [
		"subcategory" => $subcategory->getValues()
	]);
});

$app->post("/admin/subcategories/:idsubcategory", function($idsubcategory){

	User::verify_login();

	$subcategory = new Subcategory;

	$subcategory->get((int)($idsubcategory));

	$subcategory->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],12,$subcategory->getdessubcategory(),$subcategory->getidsubcategory());

	$subcategory->save();

	header("Location: /admin/subcategories");
	exit;
});

?>