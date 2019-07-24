<?php

class PDOHelper {
    public static function pdoOverArrayExample(Vehicle $v,$host,$username,$password,$dbname) {
        try {
            $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);

            $addQuery = $v->getAddQuery("pdo");
            $pdo->query($addQuery);

            $results = $pdo->query("select * from Vehicle");

            echo "</br>";
            echo "<h1>PDO: Iteration over Array";
            echo "<table>";
            echo "<tr><th>Id</th><th>Brand</th><th>Model</th><th># Doors</th><th>Gearbox type</th><th>Insert type</th>";
            while ($row = $results->fetch()) {
                if($row['insertType'] == "pdo") {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['brand'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['doorNbr'] . "</td>";
                    echo "<td>" . $row['gearboxType'] . "</td>";
                    echo "<td>" . $row['insertType'] . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";

        } catch (Exception $exc) {
            die('Error : ' . $exc->getMessage());
        }

    }

    public static function pdoOverObjectExample(Vehicle $v,$host,$username,$password,$dbname) {
        try {
            $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);

            $addQuery = $v->getAddQuery("pdo");
            $pdo->query($addQuery);

            $results = $pdo->query("select * from Vehicle");



            echo "</br>";
            echo "<h1>PDO: Iteration over Object";
            echo "<table>";
            echo "<tr><th>Id</th><th>Brand</th><th>Model</th><th># Doors</th><th>Gearbox type</th><th>Insert type</th>";
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                $vehicle = new Vehicle($row);
                var_dump($vehicle);
                if($vehicle->getInsertType() == "pdo") {
                    echo "<tr>";
                    echo "<td>" . $vehicle->getId() . "</td>";
                    echo "<td>" . $vehicle->getBrand() . "</td>";
                    echo "<td>" . $vehicle->getModel()  . "</td>";
                    echo "<td>" . $vehicle->getDoorNbr()  . "</td>";
                    echo "<td>" . $vehicle->getGearboxType() . "</td>";
                    echo "<td>" . $vehicle->getInsertType()  . "</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";

        } catch (Exception $exc) {
            die('Error : ' . $exc->getMessage());
        }

    }


    public static function PDOCRUD($v,$host,$username,$password,$dbname) {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);

        $manager = new VehicleManager($pdo);

        var_dump($manager->readAll());

        $manager->create($v);

        $vehicle1 = $manager->retrieveById(7);

        $manager->delete($vehicle1);

        $vehicle2 = $manager->retrieveById(8);
        $vehicle2->setDoorNbr(3);
        $manager->update($vehicle2);


    }
}
