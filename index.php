<?php

if ($_SERVER['REQUEST_URI'] === "/") {
    require "views/product.view.php";
} elseif ($_SERVER['REQUEST_URI'] === "/addproduct") {
    require "views/addproduct.view.php";
} else {
    require "views/404.view.php";
}
