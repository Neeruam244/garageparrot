<?php 

namespace App\Repository; 

use App\Entity\Publish_Opinion;
use App\Db\Mysql;
use App\Tools\StringTools;


class PublishRepository {

    public function findOneById(int $id_publish)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM publish_opinion WHERE id_publish = :id_publish');
        $query->bindValue(':id_publish', $id_publish, $pdo::PARAM_INT);
        $query->execute();
        $publish = $query->fetch($pdo::FETCH_ASSOC);
        $publishEntity = new Publish_Opinion();

        foreach ($publish as $key => $value) {
            $publishEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $publishEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM publish_opinion');
        $query->execute();
        $publish = $query->fetchAll($pdo::FETCH_ASSOC);

        return $publish;
    }
}
