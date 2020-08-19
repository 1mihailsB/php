<?php 
declare(strict_types = 1);
session_start();
// send back to form page to inform about success/failure of product creation
header('Location: '.'add.php');

include_once 'config/autoload.php';
include_once 'templates/commons/header.php';


$productRepo = new ProductRepo();

$isSkuUnique = $productRepo->isSkuUnique($_POST['SKU']);
$isNameUnique = $productRepo->isNameUnique($_POST['Name']);

// if SKU/name not unique - add errors to session and send back to form page
if (!$isSkuUnique || !$isNameUnique) {
    if (!$isSkuUnique) {
        $_SESSION['form_error'][] = "SKU \"{$_POST['SKU']}\" is already taken";
    }
    if (!$isNameUnique) {
        $_SESSION['form_error'][] = "Name \"{$_POST['Name']}\" is already taken";
    }

    bindPostToSession();
    exit;
}

//prepare data to create a row in DB
$productData = array();
$productData['name'] = $_POST['Name'];
$productData['sku'] = $_POST['SKU'];
$productData['price'] = $_POST['Price'];
$productData['type'] = $_POST['Type'];
//of course only meant to work with this specific assignment
$productData['attribute'] = implode('x', $_POST['attributes']);

bindPostToSession();
try {
    $_SESSION['add_success'] = true;
    $productRepo->create($productData);
    unBindPostFromSession();
} catch (\Exception $e) {
    $_SESSION['sql_error'] = $e->getMessage();
    $_SESSION['add_success'] = false;
}

//to keep the entered values in the form after user is directed
//back to form page after failure to add an item
function bindPostToSession()
{
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
}
//remove entered values from form if item successfully created
function unBindPostFromSession()
{
    foreach ($_POST as $key => $value) {
        unset($_SESSION[$key]);
    }
}