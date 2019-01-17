<?php



function addProduct() {
    $product["name"] = readline("Enter a name: ");
    $product["description"] = readline("Enter a description: ");
    $product["price"] = readline("Enter a price: ");
    $product["vat"] = readline("Enter a vat: ");

    add_product($product["name"],$product["price"],$product["description"],$product["vat"]);

    printf("\n---\nProduct added:\n");
    printProduct(get_product_by_name($product["name"]));
}

function listProduct() {
    $productsResult = get_products();
    $products = mysqli_fetch_all($productsResult, MYSQLI_ASSOC);

    foreach($products as $p){
        printProduct($p);
    }
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