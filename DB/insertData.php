<?php
$servername = "127.0.0.1";
$username = "user";
$password = "pwd";
$dbname = "hello-world-db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $data = array(
        'INSERT INTO  products (name,description, price, vat) values ("Table","Sklur",100,21)',
        'INSERT INTO  products (name,description, price, vat) values ("Chair","Zorglun",50,21)',
        'INSERT INTO  products (name,description, price, vat) values ("Lamp","Tmis",80,21)',
        'INSERT INTO  products (name,description, price, vat) values ("Laptop","Lenovo",2000,21)'
    );

    // use exec() because no results are returned
    foreach ($data as $d) {
        $conn->exec($d);
    }
    echo "Table products created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>