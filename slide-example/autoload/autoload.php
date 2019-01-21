<?php 
    autoload();

    $vehicle = new Vehicle("Tesla");

    echo "Brand: ".$vehicle->getBrand()."\n";

    $person = new Person("Elon");

    echo "Name: ".$person->getName()."\n";

    Helpers::debugLog("My log message");


    function autoload(){

        spl_autoload_register(function ($class) {
            $arr = array("model","helpers");
            foreach ($arr as $folder) {  
                $path = './'.$folder.'/' . strtolower($class) . '.php';
                if (file_exists($path) && is_readable($path)) {
                    include $path;
                }
            }
        });
    }
?>