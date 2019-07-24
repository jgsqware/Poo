------------
<?php

class ClassName {
    // Attributes
    // Methods
}

?>
------------
<?php

class ClassName {
    // Attributes
    public $id;
    public $attribute2;
    public $attribute3;

    // Methods
}

?>
------------
<?php

class ClassName {
    // Attributes
    public $id;
    public $attribute2;
    public $attribute3;

    // Methods

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}

?>
------------
<?php

class ClassName {
    // Attributes
    public $id;
    public $attribute2;
    public $attribute3;

    // Methods
}

$object1 = new ClassName();
?>
-----------
<?php

class ClassName {
    // Method
    public function method1($param1) {
        echo "param1: ".$param1;
    }
}

?>
-----------
<?php

class ClassName {
    // Method
    public function method1($param1) {
        echo "param1: ".$param1;
    }
}

$o = new ClassName();
$o->method1("Hello"); // print "param1: Hello"

?>
-----------
<?php

class ClassName {
    // Method
    public function method1($param1 = "default value") {
        echo "param1: ".$param1;
    }
}
$o = new ClassName();
$o->method1(); // print "param1: default value"
$o->method1("Hello"); // print "param1: Hello"

?>
-----------
<?php

class ClassName {
    // Method
    public function method1($object1) {
        echo "Object Name: ".$object1->getName();
    }
}

?>
-----------
<?php

class Person {
    private $name;

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
}

class ClassName {
    // Method
    public function method1(Person $object1) {
        echo "Object Name: ".$object1->getName();
    }
}

$p = new Person();
$p->setName("John");

$o = new ClassName();
$o->method1($p); // print "Object Name: John"
?>
-----------
<?php

class Person {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

$p = new Person("John");
echo "Name: ".$p->getName("John"); // print "Name: John"

?>

-----------
<?php // person.php 
class Person {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
}

?>

<?php // index.php
require_once("./Person.php");

$p = new Person("John");
echo "Name: ".$p->getName("John"); // print "Name: John"

?>

-----------
<?php

class Helpers {
    public static function println($message) {
        echo $message."\n";
    }
    public static function debugLog($message) {
        self::println("DEBUG: ".$message);
    }
}

Helpers::println("Hello");
Helpers::debugLog("I'm here");
echo "There is line break before";

?>
-----------
<?php

$mysqli = new mysqli("localhost:3306","user","pwd","vehicles");
$query = "SELECT * FROM Vehicle";
$result = $mysqli->query($query);

echo "id\tbrand\tmodel\t# doors\tgearbox type\n";
echo "-----------------------------------------------\n";
while ($row = $result->fetch_assoc()) {
    echo $row['id'];
    echo "\t". $row['brand'];
    echo "\t". $row['model'];
    echo "\t". $row['doorNbr'];
    echo "\t". $row['gearboxType'];
    echo "\n";
}
?>
-----------
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
?>
-----------
<?php
class Vehicle {
    private $id;
    private $brand;
    private $doorNbr;

    public function hydrate(array $datas) {
        foreach ($datas as $cle => $value) {
            $methodName = "set" . ucfirst($cle);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
    }

    public function setDoorNbr($doorNbr) {
        if(is_numeric($doorNbr)){
            $this->$doorNbr = $doorNbr;
        }
        throw new Exception('Should be numeric');
    }
}

?>

-----------
<?php
class Vehicle {
    private $id;
    private $brand;
    private $doorNbr;

    public function hydrate(array $datas) {
        if (isset($datas["id"])) {
            $this->setId = $datas["id"];
        }
        if (isset($datas["brand"])) {
            $this->setBrand = $datas["brand"];
        }
        if (isset($datas["model"])) {
            $this->setModel = $datas["model"];
        }
    }

    public function setDoorNbr($doorNbr) {
        if(is_numeric($doorNbr)){
            $this->$doorNbr = $doorNbr;
        }
        throw new Exception('Should be numeric');
    }
}

?>

-----------
<?php
$stmt = $db->prepare("SELECT * FROM vehicle WHERE id = 1");

$stmt->setFetchMode(PDO::FETCH_CLASS, 'Vehicle');
$stmt->execute();
$vehicle = $stmt->fetch(PDO::FETCH_CLASS);
  // Or
$vehicule = new Vehicle();
$stmt->setFetchMode(PDO::FETCH_INTO, $vehicle);
$stmt->execute();
  // Or
$vehicule = $stmt->fetch(PDO::FETCH_INTO);
$stmt->closeCursor(); 

 ?>

-----------
<?php
class VehicleManager 
{
    private $connection = null; // object PDO
    public function __construct($connection) {
        $this->connection = $connection;
    }
    
    public function getConnection(){
        return $this->connection;
    }
    
    public function setConnection($connection){
        $this->connection = $connection;
    }
}

?>

-----------
<?php
class VehicleManager 
{
    public function create(Vehicle $vehicle) {
        $stmt = $this->getConnection()->prepare(
                'INSERT INTO Vehicle SET ' .
                'brand=:brand,' .
                'model=:model,' .
                'doorNbr=:doorNbr,' .
                'gearboxType=:gearboxType'
        );

        $stmt->bindValue(':brand', $vehicle->getBrand());
        $stmt->bindValue(':model', $vehicle->getModel());
        $stmt->bindValue(':doorNbr', $vehicle->getDoorNbr(), PDO::PARAM_INT);
        $stmt->bindValue(':gearboxType', $vehicle->getGearboxType(), PDO::PARAM_INT);

        $stmt->execute();
    }
}

?>
-----------
<?php
class VehicleManager 
{
    public function retrieveById($id) {
        $id = (int) $id;

        $query = $this->getConnection()->query(
                'SELECT id, brand, model, doorNbr, gearboxType ' .
                'FROM Vehicle WHERE id = ' . $id);

        $datas = $query->fetch(PDO :: FETCH_ASSOC);

        return new Vehicle($datas);
    }
}

?>

-----------
<?php
class VehicleManager 
{
    public function readAll() {
        $vehicles = array();

        $query = $this->getConnection()->query(
                'SELECT id, brand, model, doorNbr, gearboxType ' .
                'FROM Vehicle ORDER BY brand, model');

        while ($datas = $query->fetch(PDO :: FETCH_ASSOC)) {
            $vehicles[] = new Vehicle($datas);
        }

        return $vehicles;
    }
}

?>

-----------
<?php
class VehicleManager 
{
    public function update(Vehicle $vehicle) {
        $query = $this->getConnection()->prepare(
                'UPDATE Vehicle SET ' .
                'brand=:brand,' .
                'model=:model,' .
                'doorNbr=:doorNbr,' .
                'gearboxType=:gearboxType ' .
                'WHERE id=:id'
        );

        $query->bindValue(':brand', $vehicle->getBrand());
        $query->bindValue(':model', $vehicle->getModel());
        $query->bindValue(':doorNbr', $vehicle->getDoorNbr(), PDO::PARAM_INT);
        $query->bindValue(':gearboxType', $vehicle->getGearboxType(), PDO::PARAM_INT);
        $query->bindValue(':id', $vehicle->getId(), PDO::PARAM_INT);

        $query->execute();
    }
}

?>
-----------
<?php
class VehicleManager 
{
    public function delete(Vehicle $vehicle) {
        $this->getConnection()->exec(
                'DELETE FROM Vehicle ' .
                'WHERE id = ' . $vehicle->getId()
        );
    }
}

?>