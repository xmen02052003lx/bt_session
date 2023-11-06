<?php
session_start();

if (isset($_GET['catalog']) && isset($_GET['item'])) {
    $catalogKey = $_GET['catalog'];
    $itemKey = $_GET['item'];

    if (isset($_SESSION['catalog_items'][$catalogKey][$itemKey])) {
        // Remove the item
        unset($_SESSION['catalog_items'][$catalogKey][$itemKey]);
    }
}

header("Location: index.php");
exit();
