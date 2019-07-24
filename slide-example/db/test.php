<?php

$pdo = new PDO('mysql:host=localhost:3306;dbname=vehicles', "user", "pwd");
$query = "SELECT * FROM Vehicle";
$results = $pdo->query($query);

echo "id\tbrand\tmodel\t# doors\tgearbox type\n";
echo "-----------------------------------------------\n";
while ($row = $results->fetch()) {
    echo $row['id'];
    echo "\t". $row['brand'];
    echo "\t". $row['model'];
    echo "\t". $row['doorNbr'];
    echo "\t". $row['gearboxType'];
    echo "\n";
}