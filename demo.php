<?php

myTest(1);

try {
    myTest("a");
} catch (\Throwable $th) {
    echo "Got an exception: ".$th;echo "Got an exception: ".$th;
}


function myTest($data) {
    if(is_numeric($data)){
        echo $data." is numeric\n";
    }
    throw new Exception("Error Processing Request", $data);
    
}