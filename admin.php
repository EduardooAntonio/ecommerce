<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Order;


$app->get('/admin/', function() {
    
	User::verifyLogin();

	$page = new PageAdmin();

	$order = Order::getGraph();

	$pg = [];

	for ($i=0; $i <= $order['nrtotal']; $i++) { 
		array_push($pg, [
			'nr'=>$pg
		]);
	}

	$page->setTpl("index", [
		'order'=>$order['data'],
		'pg'=>$pg
	]);

});

$app->get('/admin/login/', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login", [
		"msgError"=>User::getError()
	]);

});

$app->post('/admin/login/', function() {

	User::login($_POST["login"], $_POST["password"]);

	//teste msg error

	if (!isset($_GET["error1"]) !== 0) {

		User::setError("Login ou senha incorretos!");

		
		header("Location: /admin/login/");
		//exit;
	}

	header("Location: /admin");
	exit;

	
});

$app->get('/admin/logout', function() {

	User::logout();

	User::setError("");

	header("Location: /admin/login");
	exit;
	
});


$app->get('/admin/forgot', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");

});

//$app-post("/admin/forgot", function() {

	//$user = User::getForgot($_POST["email"]);

//});


?>