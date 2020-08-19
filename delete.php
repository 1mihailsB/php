<?php
declare(strict_types = 1);
session_start();
header('Location: '.'index.php');
include_once 'config/autoload.php';

//mark in session an attempt to delete items. will use to inform user about outcome
$_SESSION['delete_attempt'] = true;

$productRepo = new ProductRepo();

$productData = $_POST['delete_items'];

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