<?php



function addProduct() {

    $product = new Product();

    $product->setName(readline("Enter a name: "));
    $product->setDescription(readline("Enter a description: "));
    $product->setPrice(readline("Enter a price: "));
    $product->setVat(readline("Enter a vat: "));



    add_product($product);

    printf("\n---\nProduct added:\n");
    printProduct(get_product_by_name($product->getName()));
}

function listProduct() {
    $products= get_products();

    foreach($products as $p){
        printProduct($p);
    }
}