<?php

namespace App\Model; 

use App\Repository\CarRepository;

class CarModel {
    private $carRepository;

    public function __construct($carRepository) {
        $this->carRepository = $carRepository;
    }

    public function addCar($brand, $model, $description, $created_at, $year, $mileage, $energy, $price, $transmission, $color, $door_number, $fiscal_power, $interior_equipments, $exterior_equipments, $security_equipments, $others_equipments, $picture, $picture1) {
        return $this->carRepository->addCar($brand, $model, $description, $created_at, $year, $mileage, $energy, $price, $transmission, $color, $door_number, $fiscal_power, $interior_equipments, $exterior_equipments, $security_equipments, $others_equipments, $picture, $picture1);
    }
}