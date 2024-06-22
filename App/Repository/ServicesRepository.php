<?php 

namespace App\Repository; 

use App\Entity\Services;
use App\Db\Mysql;
use App\Tools\StringTools;


class ServicesRepository {

    public function findOneById(int $id_service)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM services WHERE id_service = :id_service');
        $query->bindValue(':id_service', $id_service, $pdo::PARAM_INT);
        $query->execute();
        $services = $query->fetch($pdo::FETCH_ASSOC);
        $servicesEntity = new Services();

        foreach ($services as $key => $value) {
            $servicesEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $servicesEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM services');
        $query->execute();
        $services = $query->fetchAll($pdo::FETCH_ASSOC);

        return $services;
    }

    
    public function AddServices($title, $text_presentation, $list, $picture)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO services (title, text_presentation, list, picture) 
            VALUES (:title, :text_presentation, :list, :picture)');

        $query->bindParam(':title', $title, $pdo::PARAM_STR);
        $query->bindParam(':text_presentation', $text_presentation, $pdo::PARAM_STR);
        $query->bindParam(':list', $list, $pdo::PARAM_STR);
        $query->bindParam(':picture', $picture, $pdo::PARAM_STR);

        return $query->execute();
    }

    public function UpdateCar(int $id_service, array $services)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE services SET title = :title, text_presentation = :text_presentation, list = :list, picture = :picture WHERE id_service = :id_service');

        $query->bindValue(':id_service', $id_service, $pdo::PARAM_INT);
        $query->bindValue(':title', $services['title']);
        $query->bindValue(':text_presentation', $services['text_presentation']);
        $query->bindValue(':list', $services['list']);
        $query->bindValue(':picture', $services['picture']);
        
        $query->execute();

    }

    public function DeleteServices(int $id_service):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM services WHERE id_service = :id_service');
            $query->bindValue(':id_service', $id_service, $pdo::PARAM_INT);
    
            $success = $query->execute();
    
            if (!$success) {
                throw new \Exception("Impossible de supprimer le service");
            }
    
            return true; 
        } catch (\Exception $e) {
            throw $e; 
        }

    }
}
