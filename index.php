<?php 
declare(strict_types = 1);
include_once 'config/autoload.php';

$product = new ProductRepo();

$template = new Template('templates/products.php');
$template->title = 'Products';
$template->products = $product->getAllProducts();

echo $template;


