<?php

use \AT\Model\Activity;
use \AT\PageAdmin;
use AT\Model\User;

$app->get("/admin/activities", function(){

	User::verify_login();

	$page = new PageAdmin;

	$activity = new Activity;

	$page->setTpl("activities", [
		"activities" => $activity->listAll()]
		);
});

$app->get("/admin/activities/create", function(){

	User::verify_login();

	$page = new PageAdmin;

	$page->setTpl("activities-create");
});

$app->post("/admin/activities/create", function(){

	User::verify_login();

	$activity = new Activity;

	$activity->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],15,$activity->getdesactivity(), $activity->getid());

	$activity->save();


	header("Location: /admin/activities");
	exit;

});

$app->get("/admin/activities/:idactivity/delete", function($idactivity){

	User::verify_login();

	$activity = new Activity;

	$activity->get((int)$idactivity);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],17,$activity->getdesactivity(),$activity->getid());

	$activity->delete();

	header("Location: /admin/activities");
	exit;

});

$app->get("/admin/activities/:idactivity", function($idactivity){

	User::verify_login();

	$page = new PageAdmin;

	$activity = new Activity;

	$activity->get((int)($idactivity));

	$page->setTpl("activities-update", [
		"activity" => $activity->getValues()
	]);
});

$app->post("/admin/activities/:idactivity", function($idactivity){

	User::verify_login();

	$activity = new Activity;

	$activity->get((int)($idactivity));

	$activity->setData($_POST);

	Activity::addRecentActivity(
		$_SESSION[User::SESSION]["idperson"],18,$activity->getdesactivity(),$activity->getid());
	
	$activity->save();


	header("Location: /admin/activities");
	exit;
});
?>