<?php 
declare(strict_types = 1);
include_once 'config/autoload.php';

$productRepo = new ProductRepo();

$template = new Template();

$products = $productRepo->getAllProducts();

echo $template->render('templates/products.php', $products);


