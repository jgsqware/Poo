<?php
function add_product($name, $price, $description, $vat)
{

    $query = "INSERT INTO products (name,price,description,vat,created) VALUES ('".$name."', '".floatval($price)."', '".$description."', '".floatval($vat)."', '".date("Y-m-d H:i:s")."')";

    my_query($query);
}

function get_products() {
    $query = "SELECT * FROM products";
    return my_query($query);
}

function get_product_by_name($name) {
    $query = "SELECT * FROM products WHERE name = '".$name ."'";

    return mysqli_fetch_array(my_query($query), MYSQLI_ASSOC);

}