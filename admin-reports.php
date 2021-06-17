<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Product;
use \Hcode\Model\Category;
use \Hcode\Model\Order;
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
	&nbsp;&nbsp;&nbsp;&nbsp;Relatório de Produtos
	</h1>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Edu Store </h2>
	<table>
  	<tr style='background-color: gray'>
    <th>&nbsp;ID</th>
    <th>&nbsp;Nome</th>
    <th>&nbsp;Preço(R$)</th>
    <th>&nbsp;Data Registro</th>
  </tr>

	";

	foreach ($allproduct as $product) {

	 $html .= '
  	<tr style="background-color: #d4d4d4">
   		<td>&nbsp;'.$product["id"].'</td>
   		<td>&nbsp;'.$product["nome"].'</td>
   		<td>&nbsp;'.$product["preco"].'</td>
   		<td>&nbsp;'.$product["data"].'</td>
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


$app->get("/admin/reports/users", function() {

	User::verifyLogin();

	$allusers = User::getReportsUsers();

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
	&nbsp;&nbsp;&nbsp;&nbsp;Relatório de Usuários
	</h1>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Edu Store </h2>
	<table>
  	<tr style='background-color: gray'>
    <th>&nbsp;ID</th>
    <th>&nbsp;Nome</th>
    <th>&nbsp;Email</th>
    <th>&nbsp;Fone</th>
    <th>&nbsp;Data Registro</th>
  </tr>

	";

	foreach ($allusers as $user) {

	 $html .= '
  	<tr style="background-color: #d4d4d4">
   		<td>&nbsp;'.$user["id"].'</td>
   		<td>&nbsp;'.$user["nome"].'</td>
   		<td>&nbsp;'.$user["email"].'</td>
   		<td>&nbsp;'.$user["fone"].'</td>
   		<td>&nbsp;'.$user["data"].'</td>
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


$app->get("/admin/reports/categories", function() {

	User::verifyLogin();

	$allcat = Category::getReportsCategories();

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
	&nbsp;&nbsp;&nbsp;&nbsp;Relatório de Categorias
	</h1>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Edu Store </h2>
	<table>
  	<tr style='background-color: gray'>
    <th>&nbsp;ID</th>
    <th>&nbsp;Nome</th>
    <th>&nbsp;Data Registro</th>
  </tr>

	";

	foreach ($allcat as $cat) {

	 $html .= '
  	<tr style="background-color: #d4d4d4">
   		<td>&nbsp;'.$cat["id"].'</td>
   		<td>&nbsp;'.$cat["nome"].'</td>
   		<td>&nbsp;'.$cat["data"].'</td>
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


$app->get("/admin/reports/orders", function() {

	User::verifyLogin();

	$allorders = Order::getReportsOrders();

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
	&nbsp;&nbsp;&nbsp;&nbsp;Relatório de Pedidos
	</h1>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Edu Store </h2>
	<table>
  	<tr style='background-color: gray'>
    <th>&nbsp;ID</th>
    <th>&nbsp;Nome</th>
    <th>&nbsp;Total(R$)</th>
    <th>&nbsp;Status</th>
    <th>&nbsp;Data Registro</th>
  </tr>

	";

	foreach ($allorders as $order) {

	 $html .= '
  	<tr style="background-color: #d4d4d4">
   		<td>&nbsp;'.$order["id"].'</td>
   		<td>&nbsp;'.$order["nome"].'</td>
   		<td>&nbsp;'.$order["total"].'</td>
   		<td>&nbsp;'.$order["stats"].'</td>
   		<td>&nbsp;'.$order["data"].'</td>
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

$app->get("/admin/reports/orders-value", function() {

	User::verifyLogin();

	$allorders = Order::getOrdersValueAndDay();

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
	&nbsp;&nbsp;&nbsp;&nbsp;Relatório de Pedidos
	</h1>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Edu Store </h2>
	<table>
  	<tr style='background-color: gray'>
    <th>&nbsp;Dia</th>
    <th>&nbsp;Valor Total(R$)</th>
  </tr>

	";

	foreach ($allorders as $order) {

	 $html .= '
  	<tr style="background-color: #d4d4d4">
   		<td>&nbsp;'.$order["dia"].'</td>
   		<td>&nbsp;'.$order["total"].'</td>
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