<?php 
declare(strict_types = 1);
session_start();
?>

<link rel="stylesheet" href="templates/css/products.css">

<?php 
    $attributeForType = array(
        'Book' => ['Weight', 'kg'],
        'Dvd' => ['Size', 'mb'],
        'Furniture' => ['Dimensions', 'cm']
    );
?>

<h1 class="display-4">Products</h1>
<hr class="line">

<div id="btn-group">
    <a><button type="submit" form="delete-products"  class="btn btn-danger" id="delete-button">Delete selected products</button></a>
    <a href="add.php"><button type="button" class="btn btn-primary" id="add-button">Add product</button></a>
</div>

<?php 

if (isset($_SESSION['sql_error'])) {
    echo '<div class="alert alert-danger" role="alert">'
             . var_dump($_SESSION['sql_error']) .
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

<form id="delete-products" action="delete.php" method="POST" enctype="multipart/form-data" autocomplete="off">
<div class="card-deck">
    <?php foreach($params as $param): ?>
    
        <div class="card align-items-center">
            <div class="card-body">
                <h5 class="card-title"> <?php echo $param['sku']; ?> </h5>
                <p class="card-text"> <?php echo $param['name']; ?> </p>
                <p class="card-text"> <?php echo $param['price'] . ' $'; ?> </p>
                <p class="card-text"> 
                    <?php echo $attributeForType[$param['type']][0] . ': ';  ?>
                    <?php  echo $param['attribute'] . ' ' . $attributeForType[$param['type']][1]; ?>
                </p>
            </div>
            <input class="delete-checkbox" type="checkbox" name="delete_items[]" value=<?php echo $param['id']; ?></input>
        </div>

    <?php endforeach; ?>
</div>
</form>



<?php 
$_SESSION = array();
?>