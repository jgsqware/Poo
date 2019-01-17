<?php

$exit_value=3;

my_connect();

printMenu();

// Read user choice
$choice = trim( fgets(STDIN) );

// Exit application
if( $choice == $exit_value ) {

    exit(0);
}

// Act based on user choice
switch( $choice ) {

    case 1:
        {
            listProduct();

            break;
        }
    case 2:
        {
            addProduct();
            break;
        }
    default:
        {
            echo "\n\nNo choice is entered. Please provide a valid choice.\n\n";
        }
}





function printMenu() {

    global $exit_value;
    echo "************ Reservation System ******************\n";
    echo "1 - List Products\n";
    echo "2 - Add Product\n";
    echo "3 - Quit\n";
    echo "************ Reservation System ******************\n";
    echo "Enter your choice from 1 to ".$exit_value.": ";
}

function printProduct($product)
{
    printf("id: %s\n", $product["id"]);
    printf("\tname: %s\n", $product["name"]);
    printf("\tdescription: %s\n", $product["description"]);
    printf("\tprice: %0.1f\n", $product["price"]);
    printf("\tvat: %0.1f\n", $product["vat"]);
    printf("\tcreated: %s\n", $product["created"]);

}

function listProduct() {
    $productsResult = get_products();
    $products = mysqli_fetch_all($productsResult, MYSQLI_ASSOC);

    foreach($products as $p){
        printProduct($p);
    }
}

function addProduct() {
    $product["name"] = readline("Enter a name: ");
    $product["description"] = readline("Enter a description: ");
    $product["price"] = readline("Enter a price: ");
    $product["vat"] = readline("Enter a vat: ");

    add_product($product["name"],$product["price"],$product["description"],$product["vat"]);

    printf("\n---\nProduct added:\n");
    printProduct(get_product_by_name($product["name"]));
}

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

// Connect to the database
function my_connect()
{
    global $link;

    $link = mysqli_connect('127.0.0.1', 'user', 'pwd', 'db');
    if (!$link) {
        die('Connection Error: ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }
}

// General query
function my_query($query)
{
    global $link;

    $result = mysqli_query($link, $query);

    if (!$result) {
        die('Execution error: ('.mysqli_errno($link).') '.mysqli_error($link));
    }

    return $result;
}
