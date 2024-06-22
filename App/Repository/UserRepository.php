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


    public function addUser($lastname, $firstname, $email, $hashed_password, $role)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO user (lastname, firstname, email, hashed_password, role) 
            VALUES (:lastname, :firstname, :email, :hashed_password, :role)');
        
        $query->bindParam(':lastname', $lastname, $pdo::PARAM_STR);
        $query->bindParam(':firstname', $firstname, $pdo::PARAM_STR);
        $query->bindParam(':email', $email, $pdo::PARAM_STR);
        $query->bindParam(':hashed_password', $hashed_password, $pdo::PARAM_STR);
        $query->bindParam(':role', $role, $pdo::PARAM_STR);

        return $query->execute();
    }


    public function UpdateUser(int $id_user, array $user)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE user SET lastname = :lastname, firstname = :firstname, email = :email, password_hash = :password_hash, role = :role WHERE id_user = :id_user');

        $query->bindValue(':id_user', $id_user, $pdo::PARAM_INT);
        $query->bindValue(':lastname', $user['lastname']);
        $query->bindValue(':firstname', $user['firstname']);
        $query->bindValue(':email', $user['email']);
        $query->bindValue(':password_hash', $user['password_hash']);
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
                throw new \Exception("Impossible de supprimer la personne");
            }

            return true; 
        } catch (\Exception $e) {
            throw $e; 
        }

    }
    
    public function connexionTo()
    {   
    session_start();
        try {
           
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];

                
            if ($this->controlConnexion($email, $password)) {
                $userRole = $this->RoleUser($email); 
               

                // Redirection en fonction du rôle de l'utilisateur
                if ($userRole === "administrateur") {
                    header("Location: /index.php?controller=user&action=admin");
                    exit();
                } elseif ($userRole === "employé") {
                    header("Location: /index.php?controller=user&action=employe");
                    exit();
                } else {
                    echo "Rôle non reconnu";
                }
            } else {
                echo "Email ou mot de passe incorrect";
            }
            } 
        } catch(\Exception $e) {
                throw $e; 
        }
    }
    
    public function controlConnexion ($email, $password)
    {
        try{
            //Appel BDD
                $mysql = Mysql::getInstance();
                $pdo = $mysql->getPDO();

                $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
                $query->bindParam(':email', $email, $pdo::PARAM_STR);
                $query->execute();

                $user = $query->fetch();
  
            //Vérification du mot de passe haché
                if ($user && password_verify($password, $user['hashed_password'])) {
                    return true;
                } else {
                   echo "Mot de passe incorrect.";
                   return false;
                }
        } catch (\Exception $e) {
            // Gestion des erreurs de base de données
            // Vous pouvez enregistrer l'erreur dans un fichier de log ou afficher un message d'erreur
            error_log("Erreur de connexion à la base de données: " . $e->getMessage());
            return false;
        }
    }

    public function RoleUser($email)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("SELECT role FROM user WHERE email = :email");
        $query->bindParam(':email', $email, $pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        if ($user) {
            return $user['role'];
        } else {
            return "utilisateur"; 
        }
    }

}
