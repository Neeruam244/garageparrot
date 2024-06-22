<?php

namespace App\Controller;

use App\Model\UserModel;
use App\Repository\UserRepository;


class UserController extends Controller

{
    public function route(): void
    {
        
        try{
            
            if (isset ($_GET['action'])){
                switch ($_GET['action']) {
                    case 'show': 
                        $this->show();
                        break;
                    case 'list': 
                        $this->list();
                        break;
                    case 'edit': 
                        $this->edit();
                        break;
                    case 'add': 
                        $this->add();
                        break;
                    case 'delete': 
                        $this->delete();
                        break;
                    case 'connexion': 
                        $this->connexion();
                        break;
                    case 'admin': 
                        $this->admin();
                        break; 
                    case 'employe': 
                        $this->employe();
                        break;    
                    default : 
                        throw new \Exception("Cette action n'existe pas : ".$_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    

    protected function show()
    {
        try{
            if (isset($_GET['id'])) {

                $id = (int)$_GET['id'];
                
                $userRepository = new userRepository();
                $user = $userRepository->findOneById($id);


                $this->render('user/show', [
                    'user' => $user
                ]);
            } else {
                throw new \Exception("L'id est manquant");
            }
        } catch(\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }  
    }

    protected function list()
    {
        try{
            $userRepository = new userRepository();
            $user = $userRepository->findAll();


            $this->render('user/list', [
                'user' => $user
            ]);
            
        } catch(\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }  
    }

    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    protected function add()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données du formulaire POST
                $lastname = $_POST['lastname'];
                $firstname = $_POST['firstname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                // Hachage du mot de passe
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
                // Ajouter l'user dans la bdd 
                $success = $this->userModel->addUser($lastname, $firstname, $email, $hashed_password, $role);
            
                if ($success) {
                    // Redirection vers une page de succès ou affichage d'un message de succès
                    header("Location: /user?action=list");
                    exit();
                } else {
                    throw new \Exception("Échec de l'ajout de l'utilisateur");
                }  
            } else {
                $this->showAddUserForm();    
            } 

        } catch (\Exception $e) {
                $this->render('error/default', ['error' => $e->getMessage()]);
        }
    }

    private function showAddUserForm() {
        $this->render('user/add');
    }

    protected function edit()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];

                $userRepository = new userRepository();
                $user = $userRepository->findOneById($id);

                if ($user) {
                    $this->render('user/edit', [
                        'user' => $user
                    ]);
                } else {
                    throw new \Exception("Employé non trouvé");
                }
            } else {
                throw new \Exception("L'id est manquant");

            }

        } catch (\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function delete()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];

                $userRepository = new userRepository();
                $success = $userRepository->deleteUser($id);

                if ($success) {
                    header("Location: /index.php");
                    exit;
                } else {
                    include 'templates/errors/delete_failed.php';
                }
            } else {
                $this->render('error/default', [
                    'error' => "L'ID est manquant"
                ]);
            }
        } catch (\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

    protected function connexion()
    {
        try {
            
                $userRepository = new userRepository();
                $user = $userRepository->connexionTo();
     
                $this->render('user/connexion', [
                    'user' => $user
                ]);
                
            } catch(\Exception $e) {
                
                $this->render('error/default', [
                    'error' => $e->getMessage()
                ]);
            }
    }

    protected function admin()
    {

        $this->render('user/admin', [ 
        ]);
    }

    protected function employe()
    {

        $this->render('user/employe', [ 
        ]);
    }
}