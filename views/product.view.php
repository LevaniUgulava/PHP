<?php
require_once 'database/Database.php';

$db = new Database();

$queryAll = "SELECT * FROM products ORDER BY id DESC";
$products = $db->query($queryAll)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="style/card.css">
    <link rel="stylesheet" href="style/checkbox.css">
    <script src="js/submit.js"></script>

</head>

<body>
    <h1>Product List</h1>
    <button class="add-button" onclick="window.location.href='/addproduct'">ADD</button>

    <form id="massDeleteForm" method="POST" action="Controllers/deleteproduct.php">
        <button class="delete-button" onclick="submitMassDelete()">MASS DELETE</button>
        <?php if ($products) : ?>

            <div class="card-container">
                <?php foreach ($products as $product) : ?>
                    <div class="card">
                        <div class="product-info">
                            <input type="checkbox" name="selected_products[]" value="<?php echo $product['id']; ?>" class="delete-checkbox">
                            <p class="sku">SKU: <?php echo htmlspecialchars($product['SKU']); ?></p>
                            <p class="name"><?php echo htmlspecialchars($product['Name']); ?></p>
                            <p class="price"><?php echo '$' . htmlspecialchars($product['Price']); ?></p>
                            <?php
                            $details = json_decode($product['Details'], true);
                            ?>
                            <div class="details">
                                <?php
                                if ($product["Type"] === "Furniture") {
                                    echo "<p>Dimension: ";
                                    $dimensionCount = count($details);
                                    $i = 1;
                                    foreach ($details as $value) {
                                        echo htmlspecialchars($value);
                                        if ($i < $dimensionCount) {
                                            echo "x";
                                        }
                                        $i++;
                                    }
                                    echo "</p>";
                                } elseif ($product["Type"] === "Book") {
                                    foreach ($details as $key => $value) {
                                        echo htmlspecialchars($key) . ":" . htmlspecialchars($value) . "KG";
                                    }
                                } elseif ($product["Type"] === "DVD") {
                                    foreach ($details as $key => $value) {
                                        echo  htmlspecialchars($key) . ":" . htmlspecialchars($value) . "MB";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else :  ?>

            <p class="no-products-message">No Products Exist</p>

        <?php endif ?>

    </form>

</body>

</html>