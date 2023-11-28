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

    
    public function AddServices(array $services)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO services (title, text_presentation, list, picture) 
            VALUES (:title, :text_presentation, :list, :picture)');

        $query->bindValue(':title', $services['title']);
        $query->bindValue(':text_presentation', $services['text_presentationt']);
        $query->bindValue(':list', $services['list']);
        $query->bindValue(':picture', $services['picture']);

        $query->execute();
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
                // Gérer l'échec de la suppression (peut-être en lançant une exception)
                throw new \Exception("Impossible de supprimer le service");
            }
    
            return true; // La suppression a réussi
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, journaliser l'erreur
            // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
            throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }

    }
}
