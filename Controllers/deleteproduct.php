<?php
require '../database/Database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selected_products'])) {
        $ids = $_POST['selected_products'];
        $db = new Database();
        foreach ($ids as $id) {
            $query = "Delete from products where id=$id";
            $db->query($query);
        }
        header("Location: {$_SERVER['HTTP_REFERER']}");
    } else {
        echo "No products selected for deletion.";
    }
} else {
    echo "Invalid request.";
}
