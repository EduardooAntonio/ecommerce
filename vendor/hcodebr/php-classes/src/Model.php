<?php

namespace Hcode;

class Model {
	
	private $values = [];

	public function __call($name, $args)
	{
		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		var_dump($method, $fieldName);
		exit;
	}


}

?>