<?php

class Main{
    public static function start(){

        $host = 'mysql:3306';
        $username = 'user';
        $password = 'pwd';
        $dbname = 'vehicles';

        include("helpers/mysqliHelper.php");
        include("helpers/pdoHelper.php");
        echo '<p>DB Slide example</p>';


        $v = new Vehicle();
        $v->setBrand("Tesla");
        $v->setModel("Model 3");
        $v->setDoorNbr(5);
        $v->setGearboxType("automatic");

        MysqliHelper::mysqliExample($v,$host,$username,$password,$dbname);
        PDOHelper::pdoOverArrayExample($v,$host,$username,$password,$dbname);
        //PDOHelper::pdoOverObjectExample($v,$host,$username,$password,$dbname);

    }




}