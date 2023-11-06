<?php
session_start();

if (isset($_POST['catalog']) && !empty($_POST['catalog'])) {
    $catalog = $_POST['catalog'];

    if (!isset($_SESSION['catalogs'])) {
        $_SESSION['catalogs'] = [];
    }

    $_SESSION['catalogs'][] = $catalog;
}

header("Location: index.php");
?>
