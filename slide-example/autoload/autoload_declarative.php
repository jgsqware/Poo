<?php 

    spl_autoload_register('autoload');

    $vehicle = new Vehicle("Tesla");

    echo "Brand: ".$vehicle->getBrand()."\n";

    $person = new Person("Elon");

    echo "Name: ".$person->getName()."\n";

    Helpers::debugLog("My log message");

    function autoload() {
        include("./helpers/helpers.php");
        include("./model/person.php");
        include("./model/vehicles.php");
    }
?>