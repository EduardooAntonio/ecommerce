<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Product extends Model {

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");

	}

	public static function checkList($list) {

		foreach ($list as &$row ) {
			
			$p = new Product();
			$p->setData($row);
			$row = $p->getValues();
		}


		return $list;


	}



	public function save() 
	{
		$sql = new Sql();

		$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl)", array(
			":idproduct"=>$this->getidproduct(),
			":desproduct"=>$this->getdesproduct(),
			":vlprice"=>$this->getvlprice(),
			":vlwidth"=>$this->getvlwidth(),
			":vlheight"=>$this->getvlheight(),
			":vllength"=>$this->getvllength(),
			":vlweight"=>$this->getvlweight(),
			":desurl"=>$this->getdesurl()
		));

		$this->setData($results[0]);


	}

	public function get($idproduct) {

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", [
			':idproduct'=>$idproduct
		]);

		$this->setData($results[0]);

	}

	public function delete() {

		$sql = new Sql();

		$sql->query("CALL sp_products_delete(:idproduct)", [
         ':idproduct'=>$this->getidproduct()
		]);

	}

	public function checkPhoto() {

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR .  
			"products" . DIRECTORY_SEPARATOR . 
			$this->getidproduct() . ".jpg"
			)) {

			$url = "/res/site/img/products/" . $this->getidproduct() . ".jpg";

		} else {

			$url = "/res/site/img/no-product.jpg";

		}

		return $this->setdesphoto($url);

	}

	public function getValues() {

		$this->checkPhoto();

		$values = parent::getValues();

		return $values;
	}

	public function setPhoto($file)
	{
		
		$extension = explode('.', $file['name']);
		$extension = end($extension);

		switch ($extension) {

			case "jpg":
			case "jpeg":
			$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

			case "gif":
			$image = imagecreatefromgif($file["tmp_name"]);
			break;

			case "png":
			$image = imagecreatefrompng($file["tmp_name"]);
			break;

		}

		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"products" . DIRECTORY_SEPARATOR . 
			$this->getidproduct() . ".jpg";

		imagejpeg($image, $dist);

		imagedestroy($image);

		$this->checkPhoto();

	}

	public function getFromURL($desurl)
	{

		$sql = new Sql();

		$rows = $sql->select("SELECT * FROM tb_products WHERE desurl = :desurl LIMIT 1", [
			':desurl'=>$desurl
		]);

		$this->setData($rows[0]);

	}

	public function getCategories() {

		$sql = new Sql();

		$sql->select("
			SELECT * FROM tb_categories a INNER JOIN tb_categoriesproducts b ON a.idcategory = b.idcategory WHERE b.idproduct = :idproduct
			", [
				':idproduct'=>$this->getidproduct()
			]);
	}


 public static function getPage($page = 1, $itemsPerPage = 8)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();

        $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS *
            FROM tb_products 
            ORDER BY desproduct
            LIMIT $start, $itemsPerPage;
        ");

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        foreach ($results as &$result) {
            
        $result['desphoto'] = "res/site/img/products/" .$result['idproduct'] . ".jpg";
 
        }

        return [
            'data'=>Product::checkList($results),
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }

    public static function getPageSearch($search, $page = 1, $itemsPerPage = 8)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();


        $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS *
            FROM tb_products
            WHERE desproduct LIKE :search 
            ORDER BY desproduct
            LIMIT $start, $itemsPerPage;
        ", [
            ':search'=>'%'.$search.'%'
        ]);

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        foreach ($results as &$result) {
            
        $result['desphoto'] = "/res/site/img/products/" .$result['idproduct'] . ".jpg";
 
        }

        return [
            'data'=>Product::checkList($results),
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        ];

    }


        public static function getPageSearchBox($id, $nome, $preco, $peso, $page = 1, $itemsPerPage = 8)
    {

        $start = ($page - 1) * $itemsPerPage;

        $sql = new Sql();


        $results = $sql->select("
            SELECT SQL_CALC_FOUND_ROWS *
            FROM tb_products
            WHERE idproduct LIKE :id
			AND desproduct LIKE :nome
			AND vlprice LIKE :preco
			AND vlweight LIKE :peso
            ORDER BY desproduct
            LIMIT $start, $itemsPerPage;
        ", [
            ':id'=>'%'.$id.'%',
            ':nome'=>'%'.$nome.'%',
            ':preco'=>'%'.$preco.'%',
            ':peso'=>'%'.$peso.'%'
        ]);

        //var_dump($results);
        //exit;

        $resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

        foreach ($results as &$result) {
            
        $result['desphoto'] = "/res/site/img/products/" .$result['idproduct'] . ".jpg";
 
        }

        return [
            'data'=>Product::checkList($results),
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage),
        ];

    }

    /*public static function getProductsPageSearch($search, $page = 1, $itemsPerPage = 8)
	{

		$start = ($page - 1) * $itemsPerPage;

		$sql = new Sql();

		$results = $sql->select("
			SELECT SQL_CALC_FOUND_ROWS *
            FROM tb_products
            WHERE desproduct LIKE :search 
            ORDER BY desproduct
            LIMIT $start, $itemsPerPage;
        ", [
            ':search'=>'%'.$search.'%'
        ]);

		$resultTotal = $sql->select("SELECT FOUND_ROWS() AS nrtotal;");

		return [
			'data'=>Product::checkList($results),
			'total'=>(int)$resultTotal[0]["nrtotal"],
			'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
		];

	}*/


	public static function getReportsProducts()
    {

        $sql = new Sql();

        $results = $sql->select("SELECT idproduct AS id, desproduct AS nome, vlprice AS preco, dtregister AS data FROM tb_products");

        return $results;


    }
}


?>