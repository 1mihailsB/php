
<link rel="stylesheet" href=<?php echo FRONTEND . '/css/add_product.css' ?>>


<h1 class="display-4">Add product</h1>
<hr class="line">
<a href=<?php echo BASE_URL . 'home'; ?> ><button type="button" class="btn btn-primary" id="see-all-btn">See all products</button></a>


<?php
//echo any sql error just in case.
if (isset($sql_error)) {
    echo '<div class="alert alert-danger" role="alert">'
        . $sql_error .
        '</div>';
}

if (isset($success) && $success === true) {
    echo '<div class="alert alert-success" role="alert">
                Product successfully added
             </div>';
}

if (isset($form_error)) {
    foreach ($form_error as $error => $msg) {
        echo '<div class="alert alert-danger" role="alert">'
            . $msg .
            '</div>';
    }
}

?>


    <form id="add-form" action=<?php echo BASE_URL . 'add/add'?> method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group">
            <label for="SKU">SKU</label>
            <input type="text" class="form-control" name="sku" value="<?php echo $sku ?? ''; ?>"
                   title="Max - 30" maxlength="30" placeholder="Enter SKU" required>
        </div>
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name ?? ''; ?>"
                   maxlength="100" placeholder="Enter product name" required>
        </div>
        <div class="form-group">
            <label>Price $</label>
            <input type="text" name="price" value="<?php echo $price ?? ''; ?>"
                   title="a) any number less than or equal 7 digits; b) any number with less than or equal 7 digits before dot and less than or equal 2 digits after dot"
                   pattern="\d{1,7}\.\d{1,2}|\d{1,7}"  class="form-control"  placeholder="Enter price" required>
            <label  class="text-primary">price with decimals separated by dot. For example: 150 or 14.01 or 1.99</label>
        </div>

        <h4>Product type </h4>
        <br>

        <div id="select-container">
            <select class="form-control" id="selects" name="type">
                <option value="book">Book</option>
                <option value="dvd">DVD-disc</option>
                <option value="furniture">Furniture</option>
            </select>
        </div>

        <h6>Special attributes</h6>
        <hr>

        <div id="dynamic-group"></div>
        <script type="text/javascript" src=<?php echo FRONTEND . '/js/form_dynamic.js' ?>></script>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
