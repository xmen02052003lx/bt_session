<?php
session_start();

if (isset($_POST['selected_catalog']) && isset($_POST['item']) && !empty($_POST['item'])) {
    $selectedCatalog = $_POST['selected_catalog'];
    $item = $_POST['item'];

    if (isset($_SESSION['catalogs'])) {
        foreach ($_SESSION['catalogs'] as $key => $catalog) {
            if ($catalog === $selectedCatalog) {
                if (!isset($_SESSION['catalog_items'][$key])) {
                    $_SESSION['catalog_items'][$key] = [];
                }
                $_SESSION['catalog_items'][$key][] = $item;
            }
        }
    }
}

header("Location: index.php");
?>



