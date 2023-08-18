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
                // Charger la mission par un appel au repository
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
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Vérification des données POST
                $requiredFields = ['brand', 'model', 'description', 'created_at', 'year', 'mileage', 'energy', 'price', 'transmission', 'color', 'door_number', 'fiscal_power', 'interior_equipments', 'exterior_equipments', 'security_equipments', 'others_equipments', 'picture'];
    
                $missingFields = [];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field])) {
                        $missingFields[] = $field;
                    }
                }
    
                if (empty($missingFields)) {
                    // Récupération des données du formulaire POST
                    $car = [
                        'brand' => $_POST['brand'],
                        'model' => $_POST['model'],
                        'description' => $_POST['description'],
                        'created_at' => $_POST['created_at'],
                        'year' => $_POST['year'],
                        'mileage' => $_POST['mileage'],
                        'energy' => $_POST['energy'],
                        'price' => $_POST['price'],
                        'transmission' => $_POST['transmission'],
                        'color' => $_POST['color'],
                        'door_number' => $_POST['door_number'],
                        'fiscal_power' => $_POST['fiscal_power'],
                        'interior_equipments' => $_POST['interior_equipments'],
                        'exterior_equipments' => $_POST['exterior_equipments'],
                        'security_equipments' => $_POST['security_equipments'],
                        'others_equipments' => $_POST['others_equipments'],
                        'picture' => $_POST['picture']
                    ];
    
                    // Appel au repository pour ajouter la mission
                    $carRepository = new CarRepository();
                    $success = $carRepository->addCar($car);
    
                    if ($success) {
                        // Redirection après succès
                        header('Location: /car/list');
                        exit();
                    } else {
                        // Gérer l'erreur d'ajout de mission dans le repository
                        $this->render('errors/default', [
                            'error' => "Echec pour ajouter un véhicule dans le repository."
                        ]);
                    }
                } else {
                    // Gérer les erreurs de données manquantes
                    $this->render('car/add', [
                        'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                    ]);
                }
            } else {
                // Afficher le formulaire d'ajout de mission
                $this->render('agent/add');
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
                $carRepository = new CarRepository();
                $car = $carRepository->findOneById($id);

                if ($car) {
                    // Afficher le formulaire d'édition avec les données de la mission
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

