<?php

require_once("Product.php");

function method1(PDO $conn) {
    echo "Method1\nid\tname\tdescription\tprice\tvat\n-------------------------------------------\n";
    $query = "SELECT * FROM products";
    $results = $conn->query($query);

    while ($row = $results->fetch()) {
        echo $row['id'];
        echo "\t". $row['name'];
        echo "\t". $row['description'];
        echo "\t\t". $row['price'];
        echo "\t". $row['vat'];
        echo "\n";
    }
}

function method2(PDO $conn) {
    echo "Method 2\nid\tname\tdescription\tprice\tvat\n-------------------------------------------\n";
    $query = "SELECT * FROM products";
    $results = $conn->query($query);

    while ($row = $results->fetch()) {
        $p = new Product();
        $p->hydrate($row);
        echo $p->string();
    }
}

function method3(PDO $conn, $id) {
    echo "Method 3\nid\tname\tdescription\tprice\tvat\n-------------------------------------------\n";
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=$id");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS,"Product");
    foreach ($result as $p) {
        echo $p->string();
    }
}


$servername = "127.0.0.1";
$username = "user";
$password = "pwd";
$dbname = "hello-world-db";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
}
catch(PDOException $e)
{
    echo $conn . "<br>" . $e->getMessage();
}

method1($conn);
echo "\n";
method2($conn);
echo "\n";
method3($conn,1);



?>