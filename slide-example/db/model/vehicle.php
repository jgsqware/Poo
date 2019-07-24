<?php // ./model/vehicle.php

class Vehicle {
    private $id;
    private $brand;
    private $model;
    private $doorNbr;
    private $gearboxType;
    private $insertType;

    public function getAddQuery($insertType){
        return "INSERT INTO Vehicle (brand, model, doorNbr, gearboxType,insertType) VALUES ('$this->brand','$this->model','$this->doorNbr','$this->gearboxType','$insertType')";
    }

    private static $cols = ['id', 'marque', 'modele'];
    public function hydrate(array $data){
        /*
        $this->id = $data['id'];
        $this->marque = $data['marque'];
        $this->modele = $data['modele'];
        */
        foreach ($data as $key => $val){
            $methodName = 'set'.ucfirst($key);
            $this->$methodName($val);
        }
    }

    /**
     * @return mixed
     */
    public function getInsertType()
    {
        return $this->insertType;
    }

    /**
     * @param mixed $insertType
     */
    public function setInsertType($insertType)
    {
        $this->insertType = $insertType;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getDoorNbr()
    {
        return $this->doorNbr;
    }

    /**
     * @param mixed $doorNbr
     */
    public function setDoorNbr($doorNbr)
    {
        $this->doorNbr = $doorNbr;
    }

    /**
     * @return mixed
     */
    public function getGearboxType()
    {
        return $this->gearboxType;
    }

    /**
     * @param mixed $gearboxType
     */
    public function setGearboxType($gearboxType)
    {
        $this->gearboxType = $gearboxType;
    }


}
