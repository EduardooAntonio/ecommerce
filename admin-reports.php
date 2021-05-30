<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Product;
use \Hcode\DB\Sql;
use Dompdf\Dompdf;




$app->get("/admin/reports", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("reports");


});



$app->get("/admin/reports/products", function() {

	User::verifyLogin();

	$product = Product::getReportsProducts();

	//$sql = new Sql();

	//$results = $sql->select("SELECT idproduct FROM tb_products WHERE idproduct = :idproduct", array(
		//':idproduct'=>$resu->getidproduct()
	//));

	//var_dump($results);
	//exit;

	// INSTACIAR A CLASSE DOM PDF
	$pdf = new Dompdf();
	

	$pdf->loadHtml('<h1> Primeiro exemplo </h1>');


	//RENDERIZAR O HTML
	$pdf->render();

	//gerar a saida do pdf
	$pdf->stream("relatorio.pdf",
	 array(
	 	"Attachment"=>false

	));



});


?>