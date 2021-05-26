<?php

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Product;
use \Hcode\Model\Fpdf;



$app->get("/admin/reports", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("reports");


});


$app->get("/admin/reports/products", function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$product = Product::getReportsProducts();
	
	$pdf = new Fdpf();
	
	$pdf->AddPage();
	$pdf->setFont('Arial','B', 16);
	$pdf->Cell(190,10, utf8_decode('Relatorio de Produtos') , 0, 0, "C");
	$pdf->Ln(15);

	$pdf->setFont("Arial", "I", 10);
	$pdf->Cell(50,7,"Nome",1,0);

	

	$page->setTpl("reports-products"[
		'pdf'->$pdf
	]);


});


?>