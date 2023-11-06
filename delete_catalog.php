<?php
session_start();

if (isset($_GET['catalog'])) {
    $catalogKey = $_GET['catalog'];

    if (isset($_SESSION['catalogs'][$catalogKey])) {
        // Remove the catalog
        unset($_SESSION['catalogs'][$catalogKey]);

        // Remove the associated items
        unset($_SESSION['catalog_items'][$catalogKey]);
    }
}

header("Location: index.php");
exit();
