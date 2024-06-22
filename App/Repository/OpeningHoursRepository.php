<?php 

namespace App\Repository; 

use App\Entity\openingHours;
use App\Db\Mysql;
use App\Tools\StringTools;


class OpeningHoursRepository {

    public function findOneById(int $id_openinghours)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM openinghours WHERE id_openinghours = :id_openinghours');
        $query->bindValue(':id_openinghours', $id_openinghours, $pdo::PARAM_INT);
        $query->execute();
        $openinghours = $query->fetch($pdo::FETCH_ASSOC);
        $openingHoursEntity = new OpeningHours();

        foreach ($openinghours as $key => $value) {
            $openingHoursEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $openingHoursEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM openinghours');
        $query->execute();
        $openinghours = $query->fetchAll($pdo::FETCH_ASSOC);

        return $openinghours;
    }

    
    public function AddOpeningHours(array $openinghours)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO openinghours (day_of_week, opening_time, closing_time) 
            VALUES (:day_of_week, :opening_time, :closing_time)');

        $query->bindValue(':day_of_week', $openinghours['day_of_week']);
        $query->bindValue(':opening_time', $openinghours['opening_time']);
        $query->bindValue(':closing_time', $openinghours['closing_time']);

        $query->execute();
    }

    public function UpdateOpeningHours(int $id_openinghours, array $openinghours)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE openinghours SET day_of_week = :day_of_week, opening_time = :opening_time, closing_time = :closing_time WHERE id_openinghours = :id_openinghours');

        $query->bindValue(':day_of_week', $openinghours['day_of_week']);
        $query->bindValue(':opening_time', $openinghours['opening_time']);
        $query->bindValue(':closing_time', $openinghours['closing_time']);
        
        $query->execute();

    }

    public function DeleteOpeningHours(int $id_openinghours):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM openinghours WHERE id_openinghours = :id_openinghours');
            $query->bindValue(':id_openinghours', $id_openinghours, $pdo::PARAM_INT);
    
            $success = $query->execute();
    
            if (!$success) {
                throw new \Exception("Impossible de supprimer les horaires");
            }
    
            return true; 
        } catch (\Exception $e) {
            throw $e; 
        }

    }
}
