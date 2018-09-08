<?php

use AT\PageAdmin;
use AT\Model\Category;
use AT\Model\Subcategory;
use AT\Model\User;
use AT\Model\Activity;

$app->get("/admin/categories", function(){

	User::verify_login();

	$page = new PageAdmin;

	$page->setTpl("categories",array(
		"categories" => Category::listAll()));
});

$app->get("/admin/categories/create", function(){

	User::verify_login();

	$page = new PageAdmin;

	$page->setTpl("categories-create");
});

$app->post("/admin/categories/create", function(){

	User::verify_login();

	$category = new Category;

	$category->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],7,$category->getdescategory(), $category->getidcategory());

	$category->save();
	

	header("Location: /admin/categories");

	exit;
});

$app->get("/admin/categories/:idcategory/delete", function($idcategory){

	User::verify_login();

	$category = new Category;

	$category->get((int)$idcategory);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],13,$category->getdescategory(),$category->getidcategory());

	$category->delete();


	header("Location: /admin/categories");
	exit;
});

$app->get("/admin/categories/:idcategory", function($idcategory){

	User::verify_login();

	$page = new PageAdmin;

	$category = new Category;

	$category->get((int)$idcategory);

	$page->setTpl("categories-update",array(
		"category" => $category->getValues()
	));
});

$app->post("/admin/categories/:idcategory", function($idcategory){

	User::verify_login();

	$category = new Category;

	$category->get((int)$idcategory);

	$category->setData($_POST);

	Activity::addRecentActivity($_SESSION[User::SESSION]["idperson"],14,$category->getdescategory(),$category->getidcategory());
	
	$category->save();


	header("Location: /admin/categories");
	exit;
});

$app->get("/admin/categories/:idcategory/subcategories", function($idcategory){

	User::verify_login();

	$category = new Category;

	$page = new PageAdmin();

	$category->get((int)$idcategory);

	$page->setTpl("categories-subcategories", array(
		"subcategoryNotRelated" => $category->getSubcategory(false),
		"subcategoryRelated"	=> $category->getSubcategory(),
		"category"    			=> $category->getValues()
	));
});

$app->get("/admin/categories/:idcategory/subcategories/:idsubcategory/add", function($idcategory,$idsubcategory){

	User::verify_login();

	$category = new Category;

	$page = new PageAdmin();

	$category->addSubcategoryToCategory($idcategory, $idsubcategory);

	header("Location: /admin/categories/$idcategory/subcategories");
	exit;

});

$app->get("/admin/categories/:idcategory/subcategories/:idsubcategory/remove", function($idcategory,$idsubcategory){

	User::verify_login();

	$category = new Category;

	$page = new PageAdmin();

	$category->removeSubcategoryToCategory($idcategory, $idsubcategory);

	header("Location: /admin/categories/$idcategory/subcategories");
	exit;

});
?>

