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
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-subcategories.php");
require_once("admin-activities.php");
require_once("admin-business.php");
require_once("useradmin.php");
require_once("admin-lottery.php");
$app->run();

?>