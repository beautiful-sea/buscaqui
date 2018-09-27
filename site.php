<?php

use AT\Page;
use AT\Model\Category;
use AT\Model\Subcategory;
use AT\Model\Business;
use AT\Model\User;

$app->get("/", function(){
	
	$script = ['/res/site/js/indexAll.js'];
	$page = new Page();

	$page->setTpl("index",[
		"script"	=> $script
	]);

});

$app->get("/clogin", function(){
	

	$page = new Page();
	

	$page->setTpl("clogin");

});


$app->post("/eregister-subcategories", function(){
	$category = new Category();

	$category->setidcategory($_POST['id']);

	$subcategories = $category->getSubcategory();

	echo json_encode($subcategories);

});

$app->post("/eregister-ck-email", function(){
	$user = new User();

	$result =  $user->verify_email($_POST['data']);
	echo json_encode($result);

});

$app->get("/eregister", function(){
	
	$script = [];
	array_push($script, '/res/site/js/eregister.js');
	array_push($script, '/res/site/js/indexAll.js');
	
	$page = new Page();
	$categories = new Category();

	$page->setTpl("eregister",[
		"categories" => $categories->listAll(),
		"script"	=>	$script
	]);

});

$app->post("/eregister", function(){
	$business = new Business();
	$category = new Category();
	$_POST['mobile']		= $_POST['ddd'].$_POST['mobile'];

	if($_POST['password']){
		$_POST['hashed_password'] = $business->hash_password($_POST['password']);
	}

	$business->setData($_POST);

	$business->save();

	$idcompany = $business->getid();

	foreach ($_POST['idsubcategory'] as $i => $value) {
		$category->addCategoryToBusiness($value,$idcompany);
	}

	//header("Location: /admin/login");
	//exit;

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




?>