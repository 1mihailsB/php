<?php
declare(strict_types = 1);
// change to dir where Location file is located
chdir(dirname(__DIR__));
session_start();
// send back to main page to inform about success/failure of product deletion
header('Location: '.'../index.php');

include_once 'config/autoload.php';

//mark in session an attempt to delete items. will use to inform user about outcome
$_SESSION['delete_attempt'] = true;

$productRepo = new ProductRepo();

$productData = array_map('intval', $_POST['delete_items']);

empty($productData) ? exit() : '';

try {
    //if 'deleted' is set, then items were deleted successfully
    $_SESSION['deleted'] = $productData;
    $productRepo->deleteAllById($productData);
} catch (\Exception $e) {
    $_SESSION['sql_error'] = $e->getMessage();
    //if 'deleted' is not set, then delete failed
    unset($_SESSION['deleted']);
}

exit;