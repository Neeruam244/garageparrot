<?php

namespace App\Controller;

use App\Repository\PlanningRepository;

class PlanningController extends Controller
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
                // Charger la mission par un appel au repository
                $planningRepository = new planningRepository();
                $planning = $planningRepository->findOneById($id);


                $this->render('planningr/show', [
                    'planning' => $planning
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
            $planningRepository = new planningRepository();
            $planning = $planningRepository->findAll();


            $this->render('planningr/list', [
                'planning' => $planning
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
                $requiredFields = ['jour1', 'hour1', 'jour2', 'hour2', 'jour3', 'hour3', 'jour4', 'hour4', 'jour5', 'hour5', 'jour6', 'hour6', 'jour7', 'hour7'];
    
                $missingFields = [];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field])) {
                        $missingFields[] = $field;
                    }
                }
    
                if (empty($missingFields)) {
                    // Récupération des données du formulaire POST
                    $planning = [
                        'jour1' => $_POST['jour1'],
                        'hour1' => $_POST['hour1'],
                        'jour2' => $_POST['jour2'],
                        'hour2' => $_POST['hour2'],
                        'jour3' => $_POST['jour3'],
                        'hour3' => $_POST['hour3'],
                        'jour4' => $_POST['jour4'],
                        'hour4' => $_POST['hour4'],
                        'jour5' => $_POST['jour5'],
                        'hour5' => $_POST['hour5'],
                        'jour6' => $_POST['jour6'],
                        'hour6' => $_POST['hour6'],
                        'jour7' => $_POST['jour7'],
                        'hour7' => $_POST['hour7']
                    ];
    
                    // Appel au repository pour ajouter la mission
                    $planningRepository = new planningRepository();
                    $success = $planningRepository->addPlanning($planning);
    
                    if ($success) {
                        // Redirection après succès
                        header('Location: /planning/list');
                        exit();
                    } else {
                        // Gérer l'erreur d'ajout de mission dans le repository
                        $this->render('errors/default', [
                            'error' => "Echec pour ajouter un planning dans le repository."
                        ]);
                    }
                } else {
                    // Gérer les erreurs de données manquantes
                    $this->render('planning/add', [
                        'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                    ]);
                }
            } else {
                // Afficher le formulaire d'ajout de mission
                $this->render('planning/add');
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
                $planningRepository = new PlanningRepository();
                $planning = $planningRepository->findOneById($id);

                if ($planning) {
                    // Afficher le formulaire d'édition avec les données de la mission
                    $this->render('planning/edit', [
                        'planning' => $planning
                    ]);
                } else {
                    throw new \Exception("Planning non trouvée");
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

                $planningRepository = new PlanningRepository();
                $success = $planningRepository->deletePlanning($id);

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

}

