<?php

$var1 = 0;

echo $var1."\n";

$var1 += 1;

echo $var1."\n";

$var1 = addAndMultiply($var1,1);

echo $var1."\n";


$var2 = "Julien";

echo $var2."\n";

update($var2);

echo $var2."\n";

$p = new Player("Toto");
echo $p->getName()."\n";

$p1 = new Player("Tata");
echo $p1->getName()."\n";
echo $p->getName()."\n";



class Player {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
}

function update($var){
    $var = "Toto";
}

function addAndMultiply($original, $addition) {
    $original = $original + $addition;
    
    return multiply($original,2);
}

function multiply($original,$multiply) {
    return $original * $multiply;
}