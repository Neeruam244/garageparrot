<?php

namespace App\Controller;

use App\Repository\UserRepository;

class UserController extends Controller

{
    public function route(): void
    {
        
        try{
            
            if (isset ($_GET['action'])){
                switch ($_GET['action']) {
                    case 'show': 
                        // appeler méthode show() 
                        $this->show();
                        break;
                    case 'list': 
                        // appeler méthode list()
                        $this->list();
                        break;
                    case 'edit': 
                        // appeler méthode edit()
                        $this->edit();
                        break;
                    case 'add': 
                        // appeler méthode add()
                        $this->add();
                        break;
                    case 'delete': 
                        // appeler méthode delete()
                        $this->delete();
                        break;
                    case 'connexion': 
                        // appeler méthode connexion()
                        $this->connexion();
                        break;
                    case 'admin': 
                        // appeler méthode admin()
                        $this->admin();
                        break; 
                    case 'employe': 
                        // appeler méthode employe()
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
            $this->render('errors/default', [
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
            $this->render('errors/default', [
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
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }  
    }

    protected function add()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Vérification des données POST
                $requiredFields = ['firstname', 'lastname', 'email', 'password_hash', 'role'];
    
                $missingFields = [];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field])) {
                        $missingFields[] = $field;
                    }
                }
    
                if (empty($missingFields)) {
                    // Récupération des données du formulaire POST
                    $user = [
                        'firstname' => $_POST['firstname'],
                        'lastname' => $_POST['lastname'],
                        'email' => $_POST['email'],
                        'password_hash' => $_POST['password_hash'],
                        'role' => $_POST['role']
                    ];
    
                    // Appel au repository pour ajouter la mission
                    $userRepository = new userRepository();
                    $success = $userRepository->addUser($user);
    
                    if ($success) {
                        // Redirection après succès
                        header('Location: /user/list');
                        exit();
                    } else {
                        // Gérer l'erreur d'ajout de mission dans le repository
                        $this->render('errors/default', [
                            'error' => "Echec pour ajouter un employé dans le repository."
                        ]);
                    }
                } else {
                    // Gérer les erreurs de données manquantes
                    $this->render('user/add', [
                        'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                    ]);
                }
            } else {
                // Afficher le formulaire d'ajout d'employé
                $this->render('user/add');
            }
        } catch (\Exception $e) {
            // Gérer les erreurs génériques
            $this->render('errors/default', [
                'error' => "Erreur: " . $e->getMessage()
            ]);
        }
    }

    protected function edit()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                // Charger la mission par un appel au repository
                $userRepository = new userRepository();
                $user = $userRepository->findOneById($id);

                if ($user) {
                    // Afficher le formulaire d'édition avec les données de la mission
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
            $this->render('errors/default', [
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
                    // Rediriger vers la liste des missions après la suppression réussie
                    header("Location: /index.php");
                    exit;
                } else {
                    // Gérer l'échec de la suppression, par exemple, afficher un message d'erreur
                    include 'templates/errors/delete_failed.php';
                }
            } else {
                // L'ID est manquant, gérer cela en conséquence
                $this->render('errors/default', [
                    'error' => "L'ID est manquant"
                ]);
            }
        } catch (\Exception $e) {
            // Gérer d'autres exceptions, journaliser l'erreur, etc.
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

    protected function connexion()
    {
        try {
            
                $userRepository = new userRepository();
                $user = $userRepository->connexionTo();
     
                $this->render('user/admin', [
                    'user' => $user
                ]);
                
            } catch(\Exception $e) {
                
                $this->render('errors/default', [
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