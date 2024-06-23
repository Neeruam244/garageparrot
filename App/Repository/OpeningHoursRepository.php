<?php 

namespace App\Repository; 

use App\Entity\openingHours;
use App\Model\OpeningHoursModel;
use App\Db\Mysql;
use App\Tools\StringTools;


class OpeningHoursRepository {

    public function findOneById(int $id_openinghours): ?OpeningHours {

        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $this->$pdo->prepare('SELECT * FROM opening_hours WHERE id_openinghours = :id_openinghours');
        $query->bindValue(':id_openinghours', $id_openinghours, $this->$pdo::PARAM_INT);
        $query->execute();
        $data = $query->fetch($this->$pdo::FETCH_ASSOC);

        if ($data) {
            $openingHours = new OpeningHours();
            $openingHours->setIdOpeningHours($data['id_openinghours'])
                         ->setDayOfWeek($data['day_of_week'])
                         ->setOpeningTime($data['opening_time'])
                         ->setClosingTime($data['closing_time']);
            return $openingHours;
        }

        return null;
    }

    public function findAll(): array
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM openinghours');
        $query->execute();
        $data = $query->fetchAll($pdo::FETCH_ASSOC);

        $openingHoursList = [];

        foreach ($data as $row) {
            $openingHours = new OpeningHours();
            $openingHours->setIdOpeningHours($row['id_openinghours'])
                         ->setDayOfWeek($row['day_of_week'])
                         ->setOpeningTime($row['opening_time'])
                         ->setClosingTime($row['closing_time']);
            $openingHoursList[] = $openingHours;
        }

        return $openingHoursList;
    }

    public function updateOpeningHours($openinghours): bool
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE openinghours SET day_of_week = :day_of_week, opening_time = :opening_time, closing_time = :closing_time WHERE id_openinghours = :id_openinghours');

        $query->bindValue(':id_openinghours', $openinghours->getIdOpeningHours(), $pdo::PARAM_INT);
        $query->bindValue(':day_of_week', $openinghours->getDayOfWeek());
        $query->bindValue(':opening_time', $openinghours->getOpeningTime());
        $query->bindValue(':closing_time', $openinghours->getClosingTime());
        
        return $query->execute();

    }
}
