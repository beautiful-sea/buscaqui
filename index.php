<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Rain\Tpl;
use AT\Page;
use AT\Model\Lottery;

$lottery = new Lottery;
$lottery->validateEndLottery();

$app = new Slim;

$app->config('debug', true);

require_once("site.php");
$app->run();

?>