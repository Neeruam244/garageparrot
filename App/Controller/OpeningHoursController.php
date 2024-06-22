<?php

namespace App\Controller;

use App\Repository\OpeningHoursRepository;

class OpeningHoursController extends Controller
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
                $OpeningHoursRepository = new OpeningHoursRepository();
                $openinghours = $OpeningHoursRepository->findOneById($id);


                $this->render('openinghours/show', [
                    'openinghours' => $openinghours
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
            $OpeningHoursRepository = new OpeningHoursRepository();
            $openinghours = $OpeningHoursRepository->findAll();


            $this->render('openinghours/list', [
                'openinghours' => $openinghours
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
                $requiredFields = ['day_of_week', 'opening_time', 'closing_time'];
    
                $missingFields = [];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field])) {
                        $missingFields[] = $field;
                    }
                }
    
                if (empty($missingFields)) {
                    // Récupération des données du formulaire POST
                    $openinghours = [
                        'day_of_week' => $_POST['day_of_week'],
                        'opening_time' => $_POST['opening_time'],
                        'closing_time' => $_POST['closing_time']
                    ];
    
                    $OpeningHoursRepository = new OpeningHoursRepository();
                    $success = $OpeningHoursRepository->addOpeningHours($openinghours);
    
                    if ($success) {
                        header('Location: /openinghours/list');
                        exit();
                    } else {
                        $this->render('errors/default', [
                            'error' => "Echec pour ajouter des horaires dans le repository."
                        ]);
                    }
                } else {
                    $this->render('openinghours/add', [
                        'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                    ]);
                }
            } else {
                $this->render('openinghours/add');
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => "Erreur: " . $e->getMessage()
            ]);
        }
    }

    protected function edit()
    {
        try {
                $OpeningHoursRepository = new OpeningHoursRepository();
                $openinghours = $OpeningHoursRepository->findAll();

                if ($openinghours) {
                    $this->render('openinghours/edit', [
                        'openinghours' => $openinghours
                    ]);
                } else {
                    throw new \Exception("Planning non trouvée");
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

                $OpeningHoursRepository = new OpeningHoursRepository();
                $success = $OpeningHoursRepository->deleteOpeningHours($id);

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

