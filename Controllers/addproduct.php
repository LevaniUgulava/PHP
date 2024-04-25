<?php
session_start();
require_once '../database/Database.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $db = new Database();

    $query = "INSERT INTO products (SKU, Name, Price, Type, Details) VALUES (:SKU, :Name, :price, :productType, :details)";

    $details = [];

    if ($_POST['productType'] === "DVD") {
        $details['Size'] = $_POST['size'];
    } elseif ($_POST['productType'] === "Book") {
        $details['Weight'] = $_POST['weight'];
    } elseif ($_POST['productType'] === 'Furniture') {
        $details['Height'] = $_POST['height'];
        $details['Width'] = $_POST['width'];
        $details['Length'] = $_POST['length'];
    }

    $params = [
        'SKU' => $_POST['sku'],
        'Name' => $_POST['name'],
        'price' => $_POST['price'],
        'productType' => $_POST['productType'],
        'details' => json_encode($details),
    ];

    $db->query($query, $params);

    $_SESSION['message'] = "Product added successfully!";

    header("Location: {$_SERVER['HTTP_REFERER']}");

    exit();
}

require "../views/addproduct.view.php";
