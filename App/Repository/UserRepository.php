<?php 

namespace App\Repository; 

use App\Entity\User;
use App\Db\Mysql;
use App\Tools\StringTools;


class UserRepository
{
    public function findOneById(int $id_user)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM user WHERE id_user = :id_user');
        $query->bindValue(':id_user', $id_user, $pdo::PARAM_INT);
        $query->execute();
        $user = $query->fetch($pdo::FETCH_ASSOC);
        $userEntity = new User();

        foreach ($user as $key => $value) {
            $userEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $userEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM user');
        $query->execute();
        $user = $query->fetchAll($pdo::FETCH_ASSOC);

        return $user;
    }


    public function AddUser(array $user)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO user (last_name, first_name, email, password, role) 
            VALUES (:last_name, :first_name, :email, :password, :role)');

        $query->bindValue(':last_name', $user['last_name']);
        $query->bindValue(':first_name', $user['first_name']);
        $query->bindValue(':email', $user['email']);
        $query->bindValue(':password', $user['password']);
        $query->bindValue(':role', $user['role']);

        $query->execute();
    }

    public function UpdateUser(int $id_user, array $user)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE user SET last_name = :last_name, first_name = :first_name, email = :email, password = :password, role = :role WHERE id_user = :id_user');

        $query->bindValue(':id_user', $id_user, $pdo::PARAM_INT);
        $query->bindValue(':last_name', $user['last_name']);
        $query->bindValue(':first_name', $user['first_name']);
        $query->bindValue(':email', $user['email']);
        $query->bindValue(':password', $user['password']);
        $query->bindValue(':role', $user['role']);

        $query->execute();

    }

    public function DeleteUser(int $id_user): bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('DELETE FROM user WHERE id_user = :id_user');
            $query->bindValue(':id_user', $id_user, $pdo::PARAM_INT);

            $success = $query->execute();

            if (!$success) {
                // Gérer l'échec de la suppression (peut-être en lançant une exception)
                throw new \Exception("Impossible de supprimer la personne");
            }

            return true; // La suppression a réussi
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, journaliser l'erreur
            // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
            throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }

    }

    public function connexionTo ()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
        $query->bindParam(':email', $email, $pdo::PARAM_STR);
        $query->bindParam(':password', $password, $pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    /*public function verifyUserLoginPassword(string $email, string $password)
    {

        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
            $query->bindParam(':email', $email, $pdo::PARAM_STR);

            $query->execute();
            $user = $query->fetch();

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, journaliser l'erreur
            // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
            throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }
    }*/
}
