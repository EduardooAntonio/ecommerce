<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;


$app->get("/admin/reports", function() {

	User::verifyLogin();

	$page= new PageAdmin();

	$page->setTpl("reports");


});


?>