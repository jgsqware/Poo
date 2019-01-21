<?php 

    require_once("./helpers/helpers.php");
    require_once("./model/person.php");
    require_once("./model/vehicles.php");

    $vehicle = new Vehicle("Tesla");

    echo "Brand: ".$vehicle->getBrand()."\n";

    $person = new Person("Elon");

    echo "Name: ".$person->getName()."\n";

    Helpers::debugLog("My log message")
?>