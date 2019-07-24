<?php

class Product
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $vat;
    private $created;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return floatval($this->price);
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getVat()
    {
        return floatval($this->vat);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    function ToString()
    {

        printf("id: %s\n", $this->id);
        printf("\tname: %s\n", $this->getName());
        printf("\tdescription: %s\n", $this->getDescription());
        printf("\tprice: %0.1f\n", $this->getPrice());
        printf("\tvat: %0.1f\n", $this->getVat());
        printf("\tcreated: %s\n", $this->getCreated());

    }

}