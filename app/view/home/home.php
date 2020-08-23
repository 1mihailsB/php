<?php
declare(strict_types = 1);
session_start();
?>

<link rel="stylesheet" href=<?php echo FRONTEND . '/css/products.css' ?>>

<?php
$attributeForType = array(
    'book' => ['Weight', 'kg'],
    'dvd' => ['Size', 'mb'],
    'furniture' => ['Dimensions', 'cm']
);
?>

<h1 class="display-4">Products</h1>
<hr class="line">

<div id="btn-group">
    <a><button type="submit" form="delete-products"  class="btn btn-danger" id="delete-button">Delete selected products</button></a>
    <a href=<?php echo BASE_URL . 'add'; ?> ><button type="button" class="btn btn-primary" id="add-button">Add product</button></a>
</div>

<?php

if (isset($_SESSION['$sql_error']) && $_SESSION['$sql_error'] === true) {
    echo '<div class="alert alert-danger" role="alert">'
        . var_dump($_SESSION['$sql_error']) .
        '</div>';
}

if (isset($_SESSION['delete_attempt']) && !isset($_SESSION['deleted']) && $_SESSION['delete_attempt'] === true) {
    echo '<div class="alert alert-warning" role="alert">
                Select items to delete
             </div>';
}

if (isset($_SESSION['deleted']) && $_SESSION['deleted']) {
    echo '<div class="alert alert-success" role="alert">
                Successfully deleted 
             </div>';
}

?>

<form id="delete-products" action=<?php echo BASE_URL . 'home/delete'; ?> method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="card-deck">
        <?php foreach($products as $product): ?>

            <div class="card align-items-center">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $product->getSku(); ?> </h5>
                    <p class="card-text"> <?php echo $product->getName(); ?> </p>
                    <p class="card-text"> <?php echo $product->getPrice() . ' $'; ?> </p>
                    <p class="card-text">
                        <?php echo $attributeForType[$product->getType()][0] . ': ';  ?>
                        <?php  echo $product->getAttribute() . ' ' . $attributeForType[$product->getType()][1]; ?>
                    </p>
                </div>
                <input class="delete-checkbox" type="checkbox" name="delete_items[]" value=<?php echo $product->getId(); ?></input>
            </div>

        <?php endforeach; ?>
    </div>
</form>



<?php
$_SESSION = array();
?>