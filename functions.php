<?php

use \Hcode\Model\User;
	
function formatPrice($vLprice) {

	return number_format($vLprice, 2, ",", ".");
}


function checkLogin($inadmin = true) {

	return User::checkLogin($inadmin);

}

function getUserName() {

	$user = User::getFromSession();

	return $user->getdesperson();
}

?>