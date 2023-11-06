<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
    <!-- Form for adding product catalogs -->
    <h2>Product Catalogs</h2>
    <form method="post" action="process.php" >
        <input type="text" name="catalog" placeholder="Enter Product Catalog" class="form-control d-inline-block w-50" />
        <input type="submit" class="btn btn-success btn-lg" value="Add Catalog" />
    </form>
    </div>
    <!-- Display existing product catalogs (if any) -->

<!-- Form for adding items -->
<div class="col-md-6">

    <h2>Add Items to Catalog</h2>
    <form method="post" action="add_item.php" >
    <select name="selected_catalog" class="form-select d-inline-block w-25 ">
        <?php
        if (isset($_SESSION['catalogs'])) {
            foreach ($_SESSION['catalogs'] as $catalog) {
                echo "<option value='$catalog'>$catalog</option>";
            }
        }
        ?>
    </select>
    <input class="form-control d-inline-block w-50"  type="text" name="item" placeholder="Enter Item" />
    <input type="submit" class="btn btn-success btn-lg" value="Add Item" />
</form>
    </div>
</div>
        <?php
    
    // Existing catalogs
    if (isset($_SESSION['catalogs'])) {
        echo "<div class=' mt-5 pt-5'>";
        echo "<h2>Existing Catalogs:</h2>";
        echo "<ul class='list-unstyled'>";
        foreach ($_SESSION['catalogs'] as $key => $catalog) {
            echo "<li class='text-center mx-auto mb-2'><p class='position-relative d-flex align-items-center fw-bold fs-2 text-light w-50 ' style='background-color:#036; border-radius:10px; padding-left:10px;'>$catalog <a class='btn btn-danger btn-lg x-btn position-absolute' href='delete_catalog.php?catalog=$key'>X</a></p> ";
            
            // Check if items exist for this catalog
            if (isset($_SESSION['catalog_items'][$key])) {
                echo "<ul class='row list-unstyled ms-5 ps-5'>";
    
                //Why $_SESSION['catalog_items'][$key] as $item not work?????
                foreach ($_SESSION['catalog_items'][$key] as $itemKey => $item) {
                    echo "<li class=' m-3 col-md-4'><p class='fs-3 position-relative d-flex align-items-center text-light' style='width: 152px;
                    height: 20px;
                    background-color: #336;
                    border: 1px solid white;
                    color: #fff;
                    border-radius: 10px;
                    padding: 50px 10px;
                    margin: 0px 3px 3px 3px;
                    
                    '>$item <a class='delete-btn position-absolute btn btn-danger' href='delete_item.php?catalog=$key&item=$itemKey'>Delete</a></p>  </li>";
                }
                echo "</ul>";
            }
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
