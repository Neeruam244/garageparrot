<?php

namespace App\Controller;

use App\Model\OpinionModel;
use App\Repository\OpinionRepository;

class OpinionController extends Controller
{
    public function route(): void
    {
        try{
            if (isset ($_GET['action'])){
                switch ($_GET['action']) {
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

    protected function list()
    {
        try{
            $opinionRepository = new opinionRepository();
            $opinion = $opinionRepository->findAll();

            $this->render('opinion/list', [
                'opinion' => $opinion
            ]);
            
        } catch(\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }  
    } 

    private $opinionModel;

    public function __construct($opinionModel)
    {
        $this->opinionModel = $opinionModel;
    }

    protected function add()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Vérification des données POST
                $client_name = $_POST['client_name'];
                $opinion = $_POST['opinion'];
                $note = $_POST['note'];

                $success = $this->opinionModel->addOpinion($client_name, $opinion, $note);
    
                    if ($success) {
                        header('Location: /opinion?action=list');
                        exit();
                    } else {
                        throw new \Exception("Échec de l'ajout de l'opinion du client");
                    }
            } else {
                $this->showAddOpinionForm();  
            }
            
        } catch (\Exception $e) {
            $this->render('error/default', [
                'error' => "Erreur: " . $e->getMessage()
            ]);
        }
    }

    private function showAddOpinionForm() {
        $this->render('opinion/add');
    }

    protected function edit()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                $opinionRepository = new OpinionRepository();
                $opinion = $opinionRepository->findOneById($id);

                if ($opinion) {
                    $this->render('opinion/edit', [
                        'opinion' => $opinion
                    ]);
                } else {
                    throw new \Exception("Témoignage non trouvée");
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

                $opinionRepository = new OpinionRepository();
                $success = $opinionRepository->deleteOpinion($id);

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

}

