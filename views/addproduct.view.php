<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Form</title>
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/showfields.js"></script>

</head>

<body>
    back<br>
    <a href="/">
        <i class="fas fa-arrow-left"></i>
    </a>

    <h1>Product Add</h1>
    <button class="delete-button" onclick="window.location.href='/addproduct'">Cancel</button>
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo '<div class="session-message"><p>' . $_SESSION['message'] . '</p></div>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>

    <form id="product_form" method="post" action="/Controllers/addproduct.php">
        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" value="<?php echo isset($_POST['sku']) ? $_POST['sku'] : ''; ?>" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required><br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" required><br><br>
        </div>
        </div>
        <label for="productType">Product Type:</label>
        <select id="productType" name="productType" onchange="showFields()" required>
            <option value="" selected>choose type...</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
        </select><br><br>

        <div id="specificAttributes">
            <div id="dvdFields" class="hidden">
                <label for="size">Size (in MB):</label>
                <input type="number" id="size" name="size" value="<?php echo isset($_POST['size']) ? $_POST['size'] : ''; ?>"><br><br>
            </div>

            <div id="bookFields" class="hidden">
                <label for="weight">Weight (in Kg):</label>
                <input type="number" id="weight" name="weight" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : ''; ?>"><br><br>
            </div>

            <div id="furnitureFields" class="hidden">
                <label for="height">Height (in cm):</label>
                <input type="number" id="height" name="height" value="<?php echo isset($_POST['height']) ? $_POST['height'] : ''; ?>"><br><br>

                <label for="width">Width (in cm):</label>
                <input type="number" id="width" name="width" value="<?php echo isset($_POST['width']) ? $_POST['width'] : ''; ?>"><br><br>

                <label for="length">Length (in cm):</label>
                <input type="number" id="length" name="length" value="<?php echo isset($_POST['length']) ? $_POST['length'] : ''; ?>"><br><br>
            </div>
        </div>
        <button class="add-button">Save</button>

    </form>

</body>

</html>
