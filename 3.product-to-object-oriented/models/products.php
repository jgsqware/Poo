<?php
function add_product(Product $product)
{
    $query = "INSERT INTO products (name,price,description,vat,created) VALUES ('".$product->getName()."', '".$product->getPrice()."', '".$product->getDescription()."', '".$product->getVat()."', '".date("Y-m-d H:i:s")."')";

    my_query($query);
}

function get_products() {
    $query = "SELECT * FROM products";
    $result = my_query($query);

    $r = array();
    while ($obj = mysqli_fetch_object($result,"Product")) {
        $r[] = $obj;
    }

    return $r;
}

function get_product_by_name($name) {
    $query = "SELECT * FROM products WHERE name = '".$name ."'";

    return mysqli_fetch_object(my_query($query), "Product");

}