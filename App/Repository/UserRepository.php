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
    
    public function connexionTo()
    {   
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
                // Vérifier les informations d'identification (remplacez cette logique par votre propre vérification)
            if ($this->ControlConnexion($email, $password_hash)) {
                $userRole = $this->RoleUser($email); // Obtenez le rôle de l'utilisateur à partir de votre système
    
                // Redirection en fonction du rôle de l'utilisateur
                if ($userRole === "administrateur") {
                    header("Location: admin.php");
                    exit();
                } elseif ($userRole === "employé") {
                    header("Location: employe.php");
                    exit();
                } else {
                    // Rôle non reconnu, rediriger vers une page d'erreur ou afficher un message
                    echo "Rôle non reconnu";
                }
            } else {
                echo "Email ou mot de passe incorrect";
            }
            } 
        } catch(\Exception $e) {
                // Gérer l'erreur, par exemple, journaliser l'erreur
                // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
                throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }
        
    }
    
    public function ControlConnexion ($email, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $query->bindParam(':email', $email, $pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            return true;
        } else {
            return false;
        }
    }

    public function RoleUser($email)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("SELECT role FROM user WHERE email = :email");
        $query->execute();
        $user = $query->fetch();

        if ($user) {
            // Renvoyer le rôle de l'utilisateur trouvé dans la base de données
            return $user['role'];
        } else {
            // Gérer le cas où l'utilisateur n'existe pas ou n'a pas de rôle défini
            return "utilisateur"; // Par défaut, on considère l'utilisateur comme un utilisateur standard
        }
    }

}
