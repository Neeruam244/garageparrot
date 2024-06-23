<?php

namespace App\Controller;

use App\Entity\openingHours;
use App\Model\openingHoursModel;
use App\Repository\OpeningHoursRepository;

class OpeningHoursController extends Controller
{
    public function route(): void
    {
        try{
            if (isset ($_GET['action'])){
                switch ($_GET['action']) {
                    case 'updateAll': 
                        $this->updateAll();
                        break;
                    default : 
                        $this->list();
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

    public function list() {
        try {
            $openingHours = $this->openingHoursModel->getAllOpeningHours();
            $this->render('openinghours/list', ['openingHours' => $openingHours]);
        } catch (\Exception $e) {
            $this->render('error/default', ['error' => $e->getMessage()]);
        }
    }

    //Mettre à jour les horaires

    private $openingHoursModel;

    public function __construct(OpeningHoursModel $openingHoursModel)
    {
        $this->openingHoursModel = $openingHoursModel;
    }

    protected function updateAll()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['openinghours']) && !empty($_POST['openinghours'])) {
                $openingHours = $_POST['openinghours'];

                foreach ($openingHours as $hour) {
                    $openingHour = new OpeningHours();
                    $openingHour->setIdOpeningHours($hour['id_openinghours'])
                                ->setDayOfWeek($hour['day_of_week'])
                                ->setOpeningTime($hour['opening_time'])
                                ->setClosingTime($hour['closing_time']);
                    $this->openingHoursModel->updateOpeningHours($openingHour);
                }

                header("Location: /index.php?controller=openinghours&action=list");
                exit();
            } else {
                throw new \Exception("Aucune donnée d'horaires à mettre à jour.");
            }
        } catch (\Exception $e) {
            $this->render('error/default', ['error' => $e->getMessage()]);
        }
    }
}

   

