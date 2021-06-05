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

	$allproduct = Product::getReportsProducts();

	//var_dump($product);
	//die;

	$sql = new Sql();


	// INSTACIAR A CLASSE DOM PDF
	$pdf = new Dompdf();


	$html = "

	<style>
		table {
    	font-family: arial, sans-serif;
    	border-collapse: collapse;
    	width: 100%;
	}

	td, th {
    	border: 1px solid #black;
    	text-align: left;
	}

    </style>

	<h1>
	Relatório de Produtos
	</h1>
	<table>
  	<tr style='background-color: gray'>
    <th>ID</th>
    <th>Nome</th>
    <th>Preço(R$)</th>
    <th>Data Registro</th>
  </tr>

	";

	foreach ($allproduct as $product) {

	 $html .= '
  	<tr>
   		<td>'.$product["id"].'</td>
   		<td>'.$product["nome"].'</td>
   		<td>'.$product["preco"].'</td>
   		<td>'.$product["data"].'</td>
  	</tr>

 ';
}





	$html .= '</table>';




	$pdf->loadHtml($html);


	//RENDERIZAR O HTML
	$pdf->render();

	//gerar a saida do pdf
	$pdf->stream("relatorio.pdf",
	 array(
	 	"Attachment"=>false

	));



});


?>