<?php 

namespace App\Repository; 

use App\Entity\Car;
use App\Db\Mysql;
use App\Tools\StringTools;


class CarRepository {

    public function findOneById(int $id_car)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM cars WHERE id_car = :id_car');
        $query->bindValue(':id_car', $id_car, $pdo::PARAM_INT);
        $query->execute();
        $car = $query->fetch($pdo::FETCH_ASSOC);
        $carEntity = new Car();

        foreach ($car as $key => $value) {
            $carEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $carEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM cars');
        $query->execute();
        $car = $query->fetchAll($pdo::FETCH_ASSOC);

        return $car;
    }

    
    public function AddCar($brand, $model, $description, $created_at, $year, $mileage, $energy, $price, $transmission, $color, $door_number, $fiscal_power, $interior_equipments, $exterior_equipments, $security_equipments, $others_equipments, $main_picture, $additionnal_picture)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO cars (brand, model, description, created_at, year, mileage, energy, price, transmission, color, door_number, fiscal_power, interior_equipments, exterior_equipments, security_equipments, others_equipments, main_picture, additionnal_picture) 
            VALUES (:brand, :model, :description, :created_at, :year, :mileage, :energy, :price, :transmission, :color, :door_number, :fiscal_power, :interior_equipments, :exterior_equipments, :security_equipments, :others_equipments, :main_picture, :additionnal_picture)');

        $query->bindParam(':brand', $brand, $pdo::PARAM_STR);
        $query->bindParam(':model', $model, $pdo::PARAM_STR);
        $query->bindParam(':description', $description, $pdo::PARAM_STR);
        $query->bindParam(':created_at', $created_at, $pdo::PARAM_STR);
        $query->bindParam(':year', $year, $pdo::PARAM_STR);
        $query->bindParam(':mileage', $mileage, $pdo::PARAM_STR);
        $query->bindParam(':energy', $energy, $pdo::PARAM_STR);
        $query->bindParam(':price', $price, $pdo::PARAM_STR);
        $query->bindParam(':transmission', $transmission, $pdo::PARAM_STR);
        $query->bindParam(':color', $color, $pdo::PARAM_STR);
        $query->bindParam(':door_number', $door_number, $pdo::PARAM_STR);
        $query->bindParam(':fiscal_power', $fiscal_power, $pdo::PARAM_STR);
        $query->bindParam(':interior_equipments', $interior_equipments, $pdo::PARAM_STR);
        $query->bindParam(':exterior_equipments', $exterior_equipments, $pdo::PARAM_STR);
        $query->bindParam(':security_equipments', $security_equipments, $pdo::PARAM_STR);
        $query->bindParam(':others_equipments', $others_equipments, $pdo::PARAM_STR);
        $query->bindParam(':main_picture', $main_picture, $pdo::PARAM_STR);
        $query->bindParam(':additional_picture', $additional_picture, $pdo::PARAM_STR); 

        $query->execute();
    }

    public function UpdateCar(int $id_car, array $car)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE cars SET brand = :brand, model = :model, description = :description, created_at = :created_at, year = :year, mileage = :mileage 
        energy = :energy, price = :price, transmission = :transmission, color = :color, door_number = :door_number, fiscal_power = :fiscal_power, interior_equipments = :interior_equipments, 
        exterior_equipments = :exterior_equipments, security_equipments = :security_equipments, others_equipments = :others_equipments, picture = :picture WHERE id_car = :id_car');

        $query->bindValue(':id_car', $id_car, $pdo::PARAM_INT);
        $query->bindValue(':brand', $car['brand']);
        $query->bindValue(':model', $car['model']);
        $query->bindValue(':description', $car['description']);
        $query->bindValue(':created_at', $car['created_at']);
        $query->bindValue(':year', $car['year']);
        $query->bindValue(':mileage', $car['mileage']);
        $query->bindValue(':energy', $car['energy']);
        $query->bindValue(':price', $car['price']);
        $query->bindValue(':transmission', $car['transmission']);
        $query->bindValue(':color', $car['color']);
        $query->bindValue(':door_number', $car['door_number']);
        $query->bindValue(':fiscal_power', $car['fiscal_power']);
        $query->bindValue(':interior_equipments', $car['interior_equipments']);
        $query->bindValue(':exterior_equipments', $car['exterior_equipments']);
        $query->bindValue(':security_equipmentse', $car['security_equipments']);
        $query->bindValue(':others_equipments', $car['others_equipments']);
        $query->bindValue(':picture', $car['picture']);
        
        $query->execute();

    }

    public function DeleteCar(int $id_car):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM cars WHERE id_car = :id_car');
            $query->bindValue(':id_car', $id_car, $pdo::PARAM_INT);
    
            $success = $query->execute();
    
            if (!$success) {
                throw new \Exception("Impossible de supprimer le véhicule");
            }
    
            return true; 
        } catch (\Exception $e) {
            throw $e; 
        }

    }
}
