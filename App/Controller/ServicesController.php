<?php

namespace App\Controller;

use App\Entity\Services;
use App\Model\ServicesModel;
use App\Repository\ServicesRepository;

class ServicesController extends Controller
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
                    case 'update': 
                        $this->update();
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
                
                $servicesRepository = new servicesRepository();
                $services = $servicesRepository->findOneById($id);


                $this->render('services/show', [
                    'services' => $services
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
            $servicesRepository = new servicesRepository();
            $services = $servicesRepository->findAll();


            $this->render('services/list', [
                'services' => $services
            ]);
            
        } catch(\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }  
    }

    //Ajouter un service

    private $servicesModel;

    public function __construct($servicesModel)
    {
        $this->servicesModel = $servicesModel;
    }

    protected function add()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données du formulaire POST
                $title = $_POST['title'];
                $text_presentation = $_POST['text_presentation'];
                $list = $_POST['list'];
                $picture = $_POST['picture'];
                
                $success = $this->servicesModel->addServices($title, $text_presentation, $list, $picture);
                
                if ($success) {
                    header('Location: /services?action=list');
                    exit();
                } else {
                    throw new \Exception("Échec de l'ajout d'un nouveau service");
                    }
            } else {
                    $this->showAddServicesForm();
            }
        } catch (\Exception $e) {
            $this->render('error/default', ['error' => "Erreur: " . $e->getMessage()]);
        }
    }

    private function showAddServicesForm() {
        $this->render('services/add');
    }


    //Mettre à jour un service

    public function update() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['id_service'])) {
                    $id_service = $_POST['id_service'];
                } else {
                    throw new \Exception("ID du service non spécifié.");
                }
                $title = $_POST['title'];
                $text_presentation = $_POST['text_presentation'];
                $list = $_POST['list'];
                $picture = $_POST['picture'];

                $services = $this->servicesModel->getServiceById($id_service);

                if ($services) {
                    $services->setTitle($title)
                            ->setTextPresentation($text_presentation)
                            ->setList($list)
                            ->setPicture($picture);

                    $success = $this->servicesModel->updateService($services);

                    if ($success) {
                        header("Location: /index.php?controller=services&action=list");
                        exit();
                    } else {
                        throw new \Exception("Échec de la mise à jour du service.");
                    }
                } else {
                    throw new \Exception("Service non trouvé avec l'ID spécifié.");
                }
            } else {
                if (!empty($_GET['id'])) {
                    $id_service = $_GET['id'];
                    $this->showUpdateServicesForm($id_service);
                } else {
                    throw new \Exception("ID du service non spécifié pour afficher le formulaire de mise à jour.");
                }
            }
        } catch (\Exception $e) {
            $this->render('error/default', ['error' => $e->getMessage()]);
        }
    }

    private function showUpdateServicesForm($id_service) {
        try {
            if (!empty($id_service)) {
                $services = $this->servicesModel->getServiceById($id_service);

                if (!$services) {
                    throw new \Exception("Service non trouvé avec l'ID spécifié.");
                }

                $this->render('services/update', ['services' => $services]);
            } else {
                throw new \Exception("ID du service non spécifié pour afficher le formulaire de mise à jour.");
            }
        } catch (\Exception $e) {
            $this->render('error/default', ['error' => $e->getMessage()]);
        }
    }

    //Supprimer un service

    protected function delete()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];

                $servicesRepository = new servicesRepository();
                $success = $servicesRepository->deleteServices($id);

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
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        } 
    }

}

