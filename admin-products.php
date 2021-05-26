<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Product;

$app->get("/admin/products", function(){

	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {

		$pagination = Product::getPageSearch($search, $page, 10);

	} else {

		$pagination = Product::getPage($page, 10);

	}


	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++) {

		array_push($pages, [
			'href'=>'/admin/products?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}


	$page = new PageAdmin();

	$page->setTpl("products", [
		"products"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages


	]);

});

$app->get("/admin/products/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("products-create");

});

$app->post("/admin/products/create", function(){

	User::verifyLogin();

	$product = new Product();

	$product->setData($_POST);

	$product->save();

	/*if($_FILES["file"]["name"] !== "") $product->setPhoto($_FILES['file']);*/

	$product->setPhoto($_FILES['file']);


	header("Location: /admin/products");
	exit;

});

$app->get("/admin/products/:idproduct", function($idproduct){

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	var_dump($product->getValues());

	exit;

	$page = new PageAdmin();

	$page->setTpl("products-update", [
		'product'=>$product->getValues()

	]);

});

$app->post("/admin/products/:idproduct", function($idproduct){

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$product->setData($_POST);

	$product->save();

	/*if($_FILES["file"]["name"] !== "") $product->setPhoto($_FILES["file"]);*/

	$product->setPhoto($_FILES["file"]);

	header('Location: /admin/products');
	exit;

});


$app->get("/admin/products/:idproduct/delete", function($idproduct) {

	User::verifyLogin();

	$product = new Product();

	$product->get((int)$idproduct);

	$product->delete();

	header('Location: /admin/products');
	exit;


});



?>