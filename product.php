<?php
class Product {
    private $product_id;
    private $name;
    private $photo;
    private $cost;
    private $type;
    

    public function __construct($product_id, $name, $photo, $cost, $type) {
        $this->product_id = $product_id;
        $this->name = $name;
        $this->photo = $photo;
        $this->cost = $cost;
        $this->type = $type;
    }

    public function getId() {
        return $this->product_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getCost() {
        return $this->cost;
    }
    public function getType() {
        return $this->type;
    }
}