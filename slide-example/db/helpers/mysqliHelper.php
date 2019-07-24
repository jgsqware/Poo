<?php

class MysqliHelper
{
    private $mysqli;

    public function connect($host,$username,$password,$dbname)
    {
        $this->mysqli = new mysqli($host,$username,$password,$dbname);

        if (mysqli_connect_errno()) {
            echo "Connection Error : " . mysqli_connect_error() . "<br/>";
            exit();
        }
    }


    public function query($query)
    {
        $result = $this->mysqli->query($query);
        if ($this->mysqli->error != null) {
            die($this->mysqli->error . __LINE__);
        }
        return $result;
    }



    public function close(){
        mysqli_close($this->mysqli);
    }

    public static function mysqliExample(Vehicle $v,$host,$username,$password,$dbname) {
        $mysqli = new MysqliHelper();

        $mysqli->connect($host,$username,$password,$dbname);

        //$mysqli->createTables();

        $addQuery = $v->getAddQuery("mysqli");
        $mysqli->query($addQuery);


        $query = "SELECT * FROM Vehicle";
        $result = $mysqli->query($query);


        if ($result->num_rows > 0) {
            echo "</br>";
            echo "<h1>MySQLi";
            echo "<table>";
            echo "<tr><th>Id</th><th>Brand</th><th>Model</th><th># Doors</th><th>Gearbox type</th><th>Insert type</th>";
            while ($row = $result->fetch_assoc()) {
                if($row['insertType'] == "mysqli") {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['brand'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['doorNbr'] . "</td>";
                    echo "<td>" . $row['gearboxType'] . "</td>";
                    echo "<td>" . $row['insertType'] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo 'No Data';
        }

        $mysqli->close();
    }

    public function createTables()
    {
        // sql to create table
        $query = "CREATE TABLE Vehicle (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        brand VARCHAR(30) NOT NULL,
        model VARCHAR(30) NOT NULL,
        doorNbr INTEGER NOT NULL,
        gearboxType VARCHAR(30) NOT NULL,
        insertType VARCHAR(30) NOT NULL
        )";

        return $this->query($query);
    }
}



