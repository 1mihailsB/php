<?php 
declare(strict_types = 1);
include_once 'config/autoload.php';

$template = new Template();

echo $template->render('templates/addProduct.php');
