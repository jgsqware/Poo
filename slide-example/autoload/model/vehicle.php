<?php

    class Vehicle {
        private $brand;

        public function __construct($brand) {
            $this->brand = $brand;
        }

        public function getBrand() {
            return $this->brand;
        }
    }

?>