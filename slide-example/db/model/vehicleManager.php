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

    public function retrieveById($id) {
        $id = (int) $id;

        $query = $this->getConnection()->query(
                'SELECT id, brand, model, doorNbr, gearboxType ' .
                'FROM Vehicle WHERE id = ' . $id);

        $datas = $query->fetch(PDO :: FETCH_ASSOC);

        return new Vehicle($datas);
    }

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

    public function delete(Vehicle $vehicle) {
        $this->getConnection()->exec(
                'DELETE FROM Vehicle ' .
                'WHERE id = ' . $vehicle->getId()
        );
    }
}