<?php

class Bil
{
    public $make;
    public $model;
    public $id;

    public function __construct($id, $make, $model)
    {
        $this->id = $id;
        $this->make = $make;
        $this->model = $model;
    }

    public function __toString()
    {
        return "$this->make $this->model";
    }
}
