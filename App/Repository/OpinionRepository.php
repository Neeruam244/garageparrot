<?php 

namespace App\Repository; 

use App\Entity\Opinion;
use App\Db\Mysql;
use App\Tools\StringTools;


class OpinionRepository {

    public function findOneById(int $id_opinion)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM opinion WHERE id_opinion = :id_opinion');
        $query->bindValue(':id_opinion', $id_opinion, $pdo::PARAM_INT);
        $query->execute();
        $opinion = $query->fetch($pdo::FETCH_ASSOC);
        $opinionEntity = new Opinion();

        foreach ($opinion as $key => $value) {
            $opinionEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $opinionEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM opinion');
        $query->execute();
        $publish = $query->fetchAll($pdo::FETCH_ASSOC);

        return $publish;
    }

    
    public function AddOpinion($client_name, $opinion, $note)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO opinion (client_name, opinion, note) 
            VALUES (:client_name, :opinion, :note)');

        $query->bindParam(':client_name', $client_name, $pdo::PARAM_STR);
        $query->bindParam(':opinion', $opinion, $pdo::PARAM_STR);
        $query->bindParam(':note', $note, $pdo::PARAM_STR);
        
        return $query->execute();
    }

    public function DeleteOpinion(int $id_opinion):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM opinion WHERE id_opinion = :id_opinion');
            $query->bindValue(':id_opinion', $id_opinion, $pdo::PARAM_INT);
    
            $success = $query->execute();
    
            if (!$success) {
                throw new \Exception("Impossible de supprimer le témoignage");
            }
    
            return true; 
        } catch (\Exception $e) {
            throw $e; 
        }

    }
}
