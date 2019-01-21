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
<?php
// person.php 
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

<?php
// index.php
require_once("./Person.php");

$p = new Person("John");
echo "Name: ".$p->getName("John"); // print "Name: John"

?>
