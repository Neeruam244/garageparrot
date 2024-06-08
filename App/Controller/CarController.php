<?php

namespace App\Controller;

use App\Repository\CarRepository;

class CarController extends Controller
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
                $carRepository = new carRepository();
                $car = $carRepository->findOneById($id);


                $this->render('car/show', [
                    'car' => $car
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
            $carRepository = new carRepository();
            $car = $carRepository->findAll();


            $this->render('car/list', [
                'car' => $car
            ]);
            
        } catch(\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }  
    }

    protected function add()
    {
        var_dump($_POST);
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Liste des champs requis
                $requiredFields = ['brand', 'model', 'description', 'created_at', 'year', 'mileage', 'energy', 'price', 'transmission', 'color', 
                'door_number', 'fiscal_power', 'interior_equipments', 'exterior_equipments', 'security_equipments', 'others_equipments', 'picture'];
    
                $missingFields = [];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
                        $missingFields[] = $field;
                    }
                }

                if (!empty($missingFields)) {
                    $this->render('car/add', [
                        'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                    ]);
                    return;
                }
    
                // Validation des données
                    $car = [
                        'brand' => filter_input(INPUT_POST, 'brand'),
                        'model' => filter_input(INPUT_POST, 'model'),
                        'description' => filter_input(INPUT_POST, 'description'),
                        'created_at' => filter_input(INPUT_POST, 'created_at'),
                        'year' => filter_input(INPUT_POST, 'year'),
                        'mileage' => filter_input(INPUT_POST, 'mileage'),
                        'energy' => filter_input(INPUT_POST, 'energy'),
                        'price' => filter_input(INPUT_POST, 'price'),
                        'transmission' => filter_input(INPUT_POST, 'transmission'),
                        'color' => filter_input(INPUT_POST, 'color'),
                        'door_number' => filter_input(INPUT_POST, 'door_number'),
                        'fiscal_power' => filter_input(INPUT_POST, 'fiscal_power'),
                        'interior_equipments' => filter_input(INPUT_POST, 'interior_equipments'),
                        'exterior_equipments' => filter_input(INPUT_POST, 'exterior_equipments'),
                        'security_equipments' => filter_input(INPUT_POST, 'security_equipments'),
                        'others_equipments' => filter_input(INPUT_POST, 'others_equipments'),
                    ];

                // Gestion de l'image
                if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
                    $picture = $_FILES['picture'];
                    $uploadDir = '/path/to/upload/dir/';
                    $uploadFile = $uploadDir . basename($picture['name']);

                    if (!move_uploaded_file($picture['tmp_name'], $uploadFile)) {
                        $this->render('car/add', [
                            'error' => 'Erreur lors de l\'upload de l\'image.'
                        ]);
                        return;
                    }

                    $car['picture'] = $uploadFile;
                } else {
                    $this->render('car/add', [
                        'error' => 'L\'image est manquante ou il y a eu une erreur lors de l\'upload.'
                    ]);
                    return;
                }

                // Insertion dans le dépôt de données
                    $carRepository = new CarRepository();
                    $success = $carRepository->addCar($car);
    
                    if ($success) {
                        $redirectUrl = '/index.php?controller=page&action=home';
                        var_dump($redirectUrl); // Afficher l'URL de redirection
                        // Redirection après succès
                        header('Location: ' . $redirectUrl);
                        exit();
                    } else {
                        // Gérer l'erreur 
                        $this->render('errors/default', [
                            'error' => "Echec pour ajouter un véhicule."
                        ]);
                    }
            } else {
                // Afficher le formulaire d'ajout de mission
                $this->render('/car/add');
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
                // Charger la voiture par un appel au repository
                $carRepository = new CarRepository();
                $car = $carRepository->findOneById($id);

                if ($car) {
                    // Afficher le formulaire d'édition avec les données de la voiture
                    $this->render('car/edit', [
                        'car' => $car
                    ]);
                } else {
                    throw new \Exception("Véhicule non trouvée");
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

                $carRepository = new CarRepository();
                $success = $carRepository->deleteCar($id);

                if ($success) {
                    // Rediriger vers la liste des véhicules après la suppression réussie
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

