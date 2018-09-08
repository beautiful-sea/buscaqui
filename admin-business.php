<?php

use AT\PageAdmin;
use AT\Model\Category;
use AT\Model\Activity;
use AT\Model\Business;
use AT\Model\User;


$app->get("/admin/business",function(){

	$category = new Category;
	$business = new Business;

	$page = new PageAdmin;

	$page->setTpl("business", [
		"categories" => $category->listAll(),
		"business"   => $business->listAll()
	]);
});

$app->get("/admin/business/create/:idcategory",function($idcategory){

	$category = new Category;
	$category->setidcategory((int)$idcategory);

	$page = new PageAdmin;

	$page->setTpl("business-create",[
		"subcategories" => $category->getSubcategory()]);
});

$app->post("/admin/business/create",function(){

	$business = new Business;


	$_POST["despassword"] = hash("md5", $_POST["despassword"]);
	
	$business->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],20,$business->getdesbusiness(), $business->getidbusiness());

	$business->save();

	header("Location: /admin/business");
	exit;

});

$app->get("/admin/business/:idbusiness/delete",function($idbusiness){

	$business = new Business;

	$business->get((int)$idbusiness);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],22,$business->getdesbusiness(), $business->getidbusiness());

	$business->delete();

	header("Location: /admin/business");
	exit;

});

$app->get("/admin/business/:idbusiness",function($idbusiness){

	$business = new Business;

	$business->get((int)$idbusiness);

	$page = new PageAdmin;

	$business->checkPhoto();

	$page->setTpl("business-update",[
		"business" => $business->getValues()
	]);
});

$app->post("/admin/business/:idbusiness",function($idbusiness){

	$business = new Business;

	$business->get((int)$idbusiness);
	
	if($_FILES["file"]["name"] != NULL){
		$business->setPhoto($_FILES["file"]);
	}

	$business->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],21,$business->getdesbusiness(), $business->getidbusiness());

	$business->update();

	header("Location: /admin/business");
	exit;
});
?>