<?php

use \AT\Model\User;
use \AT\PageAdmin;
use \AT\Model\Lottery;
use \AT\Model\Participant;


$app->get("/admin/lottery", function(){

	User::verify_login();

	$lottery = new Lottery;
	$page = new PageAdmin;

	$lotteries = $lottery->listAll();

	$partActive = $lottery->getPAL();

	$activeLottery = $lottery->getActive();
	$activeLottery[0]["count"] = count($partActive);
	$page->setTpl("lottery",[
		"lottery"	=>	$lotteries,
		"participants"=>$partActive,
		"activeLottery"=>$activeLottery
	]);

});

$app->get("/admin/lottery/create", function(){

	User::verify_login();

	$page = new PageAdmin;

	$page->setTpl("lottery-create");

});

$app->post("/admin/lottery/create", function(){

	User::verify_login();

	$lottery = new Lottery;

	$lottery->setData($_POST);

	$lottery->addLottery();

	header("Location: /admin/lottery");
	exit;

});

$app->get("/admin/lottery/:idlottery/delete", function($idlottery){

	User::verify_login();
	$lottery = new Lottery;
	$lottery->deleteLottery($idlottery);

	header("Location: /admin/lottery");
	exit;

});

$app->get("/admin/lottery/:idlottery", function($idlottery){

	User::verify_login();

	$lottery = new Lottery;
	$page = new PageAdmin;

	$lottery->get($idlottery);

	$page->setTpl("lottery-update",["lottery"=>$lottery->getValues()]);

});

$app->post("/admin/lottery/:idlottery", function($idlottery){

	User::verify_login();

	$lottery = new Lottery;

	$lottery->setData($_POST);

	$lottery->updateLottery($idlottery);

	header("Location: /admin/lottery");
	exit;

});

$app->get("/admin/lottery/pal/:idparticipant/delete", function($idparticipant){

	User::verify_login();

	$lottery = new Lottery;
	$lottery->deletePAL($idparticipant);

	header("Location: /admin/lottery");
	exit;

});

$app->get("/admin/lottery/pal/create", function(){

	User::verify_login();

	$page = new PageAdmin;

	$page->setTpl("participant-create");

});

$app->post("/admin/lottery/pal/create", function(){

	User::verify_login();

	$participant = new Participant;
	$lottery = new Lottery;

	$active = $lottery->getActive();

	$participant->setidlottery($active[0]["idlottery"]);
	$participant->setData($_POST);

	$participant->addParticipant();

	header("Location: /admin/lottery");
	exit;

});
?>