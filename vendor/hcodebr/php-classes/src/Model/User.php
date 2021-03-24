<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class User extends Model {

	const SESSION = "User";

	public static function login($login, $password) {
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (count($results) === 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");

		}

		$data = $results[0];

		if (password_verify($password, $data["despassword"]) === true)
		{


			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;


		} else {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

	}

	public static function verifyLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
			||
			(bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin
			)

		{

			header("Location: /admin/login");
			exit;
		}
	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;
	}

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson" );

	}

	public function get($iduser) 
	{
	$sql = new Sql();
	$results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser", array(
		":iduser"=>$iduser
	));
 
	$data = $results[0];
	$data['desperson'] = utf8_encode($data['desperson']);
 
	$this->setData($data);
	}
}


?>