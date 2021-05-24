<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;


$app = new Slim();

$app->config('debug', true);

require_once("site.php");

require_once("admin.php");

require_once("admin-user.php");

require_once("admin-category.php");

require_once("admin-product.php");

require_once("admin-reports.php");

require_once("admin-orders.php");

require_once("functions.php");


$app->run();



 ?>