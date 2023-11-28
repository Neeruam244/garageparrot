<?php 

namespace App\Repository; 

use App\Entity\Planning;
use App\Db\Mysql;
use App\Tools\StringTools;


class PlanningRepository {

    public function findOneById(int $id_planning)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM planning WHERE id_planning = :id_planning');
        $query->bindValue(':id_planning', $id_planning, $pdo::PARAM_INT);
        $query->execute();
        $planning = $query->fetch($pdo::FETCH_ASSOC);
        $planningEntity = new Planning();

        foreach ($planning as $key => $value) {
            $planningEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $planningEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM planning');
        $query->execute();
        $planning = $query->fetchAll($pdo::FETCH_ASSOC);

        return $planning;
    }

    
    public function AddPlanning(array $planning)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO planning (jour1, hour1, jour2, hour2, jour3, hour3, jour4, hour4, jour5, hour5, jour6, hour6, jour7, hour7) 
            VALUES (:jour1, :hour1, :jour2, :hour2, :jour3, :hour3, :jour4, :hour4, :jour5, :hour5, :jour6, :hour6, :jour7, :hour7)');

        $query->bindValue(':jour1', $planning['jour1']);
        $query->bindValue(':hour1', $planning['hour1']);
        $query->bindValue(':jour2', $planning['jour2']);
        $query->bindValue(':hour2', $planning['hour2']);
        $query->bindValue(':jour3', $planning['jour3']);
        $query->bindValue(':hour3', $planning['hour3']);
        $query->bindValue(':jour4', $planning['jour4']);
        $query->bindValue(':hour4', $planning['hour4']);
        $query->bindValue(':jour5', $planning['jour5']);
        $query->bindValue(':hour5', $planning['hour5']);
        $query->bindValue(':jour6', $planning['jour6']);
        $query->bindValue(':hour6', $planning['hour6']);
        $query->bindValue(':jour7', $planning['jour7']);
        $query->bindValue(':hour7', $planning['hour7']);

        $query->execute();
    }

    public function UpdatePlanning(int $id_planning, array $planning)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE planning SET jour1 = :jour1, hour1 = :hour1, jour2 = :jour2, hour2 = :hour2, jour3 = :jour3, hour3 = :hour3, 
        jour4 = :jour4, hour4 = :hour4, jour5 = :jour5, hour5 = :hour5, jour6 = :jour6, hour6 = :hour6, jour7 = :jour7, hour7 = :hour7 WHERE id_planning = :id_planning');

        $query->bindValue(':jour1', $planning['jour1']);
        $query->bindValue(':hour1', $planning['hour1']);
        $query->bindValue(':jour2', $planning['jour2']);
        $query->bindValue(':hour2', $planning['hour2']);
        $query->bindValue(':jour3', $planning['jour3']);
        $query->bindValue(':hour3', $planning['hour3']);
        $query->bindValue(':jour4', $planning['jour4']);
        $query->bindValue(':hour4', $planning['hour4']);
        $query->bindValue(':jour5', $planning['jour5']);
        $query->bindValue(':hour5', $planning['hour5']);
        $query->bindValue(':jour6', $planning['jour6']);
        $query->bindValue(':hour6', $planning['hour6']);
        $query->bindValue(':jour7', $planning['jour7']);
        $query->bindValue(':hour7', $planning['hour7']);
        
        $query->execute();

    }

    public function DeletePlanning(int $id_planning):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM planning WHERE id_planning = :id_planning');
            $query->bindValue(':id_planning', $id_planning, $pdo::PARAM_INT);
    
            $success = $query->execute();
    
            if (!$success) {
                // Gérer l'échec de la suppression (peut-être en lançant une exception)
                throw new \Exception("Impossible de supprimer le véhicule");
            }
    
            return true; // La suppression a réussi
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, journaliser l'erreur
            // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
            throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }

    }
}
