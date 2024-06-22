<?php

namespace App\Controller;

use App\Model\CarModel;
use App\Repository\CarRepository;

class CarController extends Controller
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
                $carRepository = new carRepository();
                $car = $carRepository->findOneById($id);


                $this->render('car/show', [
                    'car' => $car
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
            $carRepository = new carRepository();
            $car = $carRepository->findAll();


            $this->render('car/list', [
                'car' => $car
            ]);
            
        } catch(\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }  
    }

    private $carModel;

    public function __construct($carModel)
    {
        $this->carModel = $carModel;
    }

    protected function add()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $this->validateFormData($_POST);

                // Récupération des données du formulaire POST
                    $brand = $_POST['brand'];
                    $model = $_POST['model'];
                    $description = $_POST['description'];
                    $created_at = $_POST['created_at'];
                    $year = $_POST['year'];
                    $mileage = $_POST['mileage'];
                    $energy = $_POST['energy'];
                    $price = $_POST['price'];
                    $transmission = $_POST['transmission'];
                    $color = $_POST['color'];
                    $door_number = $_POST['door_number'];
                    $fiscal_power = $_POST['fiscal_power'];
                    $interior_equipments = $_POST['interior_equipments'];
                    $exterior_equipments = $_POST['exterior_equipments'];
                    $security_equipments = $_POST['security_equipments'];
                    $others_equipments = $_POST['others_equipments'];
                    var_dump($_POST);
                    var_dump($_FILES);

                // Chemin de base pour le téléchargement des images
                $uploadDir = 'C:\wamp64\www\garageparrot\uploads\cars\\';

                // Gestion de l'image principale
                if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
                    $picture = $_FILES['picture'];
                    $uploadFile = $uploadDir . basename($picture['name']);

                    if (!move_uploaded_file($picture['tmp_name'], $uploadFile)) {
                        throw new \Exception('Erreur lors de l\'upload de l\'image principale.');
                    }

                    // Exemple de données à stocker sous forme de JSON pour l'image principale
                    $mainPictureData = [
                        'name' => $picture['name'],
                        'size' => $picture['size'],
                        'description' => 'Image principale'
                    ];

                    // Encodage des données en JSON
                    $encodedMainPicture = json_encode($mainPictureData);
                } else {
                    throw new \Exception('L\'image principale est manquante ou il y a eu une erreur lors de l\'upload.');
                }

                // Gestion des images supplémentaires
                    $additionalPicturesData = [];
                        if (!empty($_FILES['picture1']['name']) && is_array($_FILES['picture1']['name'])) {
                            foreach ($_FILES['picture1']['name'] as $key => $name) {
                                if ($_FILES['picture1']['error'][$key] === UPLOAD_ERR_OK) {
                                    $tmp_name = $_FILES['picture1']['tmp_name'][$key];
                                    $uploadFile = $uploadDir . basename($name);

                                    if (move_uploaded_file($tmp_name, $uploadFile)) {
                                        $additionalPicturesData[] = [
                                            'name' => $name,
                                            'size' => $_FILES['picture1']['size'][$key],
                                            'description' => 'Image supplémentaire'
                                            ];
                                    } else {
                                            throw new \Exception('Erreur lors de l\'upload de l\'image : ' . $name);
                                    }
                                } else {
                                    throw new \Exception('Erreur lors de l\'upload de l\'image : ' . $name);
                                }
                            }       

                            // Encodage des données en JSON pour les images supplémentaires
                            $encodedAdditionalPictures = json_encode($additionalPicturesData);
                        } else {
                            throw new \Exception('Les images supplémentaires sont manquantes ou il y a eu une erreur lors de l\'upload.');
                        }


                $success = $this->carModel->addCar($brand, $model, $description, $created_at, $year, $mileage, $energy, $price, 
                    $transmission, $color, $door_number, $fiscal_power, $interior_equipments, $exterior_equipments, 
                    $security_equipments, $others_equipments, $encodedMainPicture, $encodedAdditionalPictures);

                if ($success) {
                    // Redirection après succès
                    header('Location: /car?action=list');
                    exit();
                } else {
                    throw new \Exception("Échec de l'ajout d'une voiture d'occasion");
                }
            } else {
                $this->showAddCarForm();    
            } 
        } catch (\Exception $e) {
            $this->render('error/default', ['error' => "Erreur: " . $e->getMessage()]);
        }
    }
    
    private function showAddCarForm() {
        $this->render('car/add');
    }

    private function validateFormData($formData) {
        $validations = [
            'year' => 'L\'année doit être un nombre valide.',
            'price' => 'Le prix doit être un nombre valide.',
            'door_number' => 'Le nombre de portes doit être un nombre valide.',
            'fiscal_power' => 'La puissance fiscale doit être un nombre valide.',
        ];
    
        foreach ($validations as $key => $errorMessage) {
            if (!is_numeric($formData[$key])) {
                throw new \Exception($errorMessage);
            }
        }

        if ($_POST['mileage'] < 0) {
            throw new \Exception('Le kilométrage ne peut pas être négatif.');
        }
                
        if (!preg_match('/^\d{4}$/', $_POST['year'])) {
            throw new \Exception('L\'année doit être au format YYYY (ex. 2024).');
        }
    }

    protected function edit()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                $carRepository = new CarRepository();
                $car = $carRepository->findOneById($id);

                if ($car) {
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

                $carRepository = new CarRepository();
                $success = $carRepository->deleteCar($id);

                if ($success) {
                    header("Location: /index.php");
                    exit;
                } else {
                    include 'templates/errors/delete_failed.php';
                }
            } else {
                $this->render('errors/default', [
                    'error' => "L'ID est manquant"
                ]);
            }
        } catch (\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

}

