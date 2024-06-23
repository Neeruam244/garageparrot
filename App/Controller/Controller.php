<?php

namespace App\Controller;

use App\Db\Mysql;
use App\Repository\UserRepository;
use App\Model\UserModel;
use App\Repository\ServicesRepository;
use App\Model\ServicesModel;
use App\Repository\OpinionRepository;
use App\Model\OpinionModel;
use App\Repository\CarRepository;
use App\Model\CarModel;
use App\Entity\openingHours;
use App\Repository\OpeningHoursRepository;
use App\Model\OpeningHoursModel;

class Controller 
{
    private $db;

    public function __construct() {
        $this->db = Mysql::getInstance()->getPDO();
    }

    public function route(): void
    {
        try{
            if (isset ($_GET['controller'])){
                switch ($_GET['controller']) {
                    case 'page': 
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'car': 
                        $carRepository = new CarRepository($this->db);
                        $carModel = new CarModel($carRepository); 
                        $carController = new CarController($carModel);
                        $carController->route();
                        break;
                    case 'opinion': 
                        $opinionRepository = new OpinionRepository($this->db);
                        $opinionModel = new OpinionModel($opinionRepository); 
                        $opinionController = new OpinionController($opinionModel);
                        $opinionController->route();
                        break;
                    case 'publish': 
                        $publishController = new PublishController();
                        $publishController->route();
                        break;
                    case 'services':
                        $servicesRepository = new ServicesRepository($this->db);
                        $servicesModel = new ServicesModel($servicesRepository); 
                        $servicesController = new ServicesController($servicesModel);
                        $servicesController->route();
                        break;
                    case 'openinghours': 
                        $openinghoursRepository = new OpeningHoursRepository();
                        $openingHoursModel = new OpeningHoursModel($openinghoursRepository);
                        $openinghoursController = new OpeningHoursController($openingHoursModel);
                        $openinghoursController->route();
                        break;
                    case 'user': 
                        $userRepository = new UserRepository($this->db);
                        $userModel = new UserModel($userRepository);
                        $userController = new UserController($userModel);
                        $userController->route();
                        break;
                    case 'dashboard': 
                        // Exemple de gestion du tableau de bord
                        if (isset($_COOKIE['user_role'])) {
                            $user_role = $_COOKIE['user_role'];
                            switch ($user_role) {
                                    case 'administrateur':
                                        // Charger la vue admin.php
                                            $this->render('user/admin', [
                                            'user_role' => $user_role,
                                            'message' => 'Bienvenue dans votre back office admnistrateur.'
                                            ]);
                                        break;
                                    case 'employe':
                                        // Charger la vue employe.php
                                            $this->render('user/employe', [
                                            'user_role' => $user_role,
                                            'message' => 'Bienvenue dans votre back office employé.'
                                            ]);
                                        break;
                                    default:
                                        echo "Rôle non reconnu.";
                                        break;
                                }
                        } else {
                            // Redirection si le cookie n'est pas défini
                            header("Location: /login");
                            exit();
                        }
                    break;
                    default : 
                        throw new \Exception("Le controleur n'existe pas");
                        break;
                }
            } else {
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e){
            $this->render('error/default', [
                'error' => $e->getMessage()
            ]);
        }
       
    }

    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        try{
            if (!file_exists($filePath)){
                //Générer erreur
                throw new \Exception("Fichier non trouvé :".$path);
            } 

            extract($params);
            require_once $filePath;
            
        } catch (\Exception $e) {
            echo "Erreur : " . $e->getMessage();
            // Logger l'erreur si nécessaire
            error_log("Erreur de rendu : " . $e->getMessage());
            $this->render('error/default', ['error' => $e->getMessage()]);
        }
    }

}
