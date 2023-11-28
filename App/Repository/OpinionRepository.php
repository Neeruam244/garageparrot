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

    
    public function AddOpinion(array $opinion)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO opinion (client_name, opinion, note) 
            VALUES (:client_name, :opinion, :note)');

        $query->bindValue(':brand', $opinion['client_name']);
        $query->bindValue(':opinion', $opinion['opinion']);
        $query->bindValue(':note', $opinion['note']);
        

        $query->execute();
    }

    public function UpdateOpinion(int $id_opinion, array $opinion)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE opinion SET client_name = :client_name, opinion = :opinion, note = :note WHERE id_opinion = :id_opinion');

        $query->bindValue(':id_opinion', $id_opinion, $pdo::PARAM_INT);
        $query->bindValue(':client_name', $opinion['client_name']);
        $query->bindValue(':opinion', $opinion['opinion']);
        $query->bindValue(':note', $opinion['note']);
        
        $query->execute();

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
                // Gérer l'échec de la suppression (peut-être en lançant une exception)
                throw new \Exception("Impossible de supprimer le témoignage");
            }
    
            return true; // La suppression a réussi
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, journaliser l'erreur
            // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
            throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }

    }
}
