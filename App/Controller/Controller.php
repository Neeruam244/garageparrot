<?php

namespace App\Controller;

class Controller 
{
    public function route(): void
    {
        try{
            if (isset ($_GET['controller'])){
                switch ($_GET['controller']) {
                    case 'page': 
                        // charger le controller page 
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'car': 
                        $pageController = new CarController();
                        $pageController->route();
                        break;
                    case 'opinion': 
                        $pageController = new OpinionController();
                        $pageController->route();
                        break;
                    case 'publish': 
                        $pageController = new PublishController();
                        $pageController->route();
                        break;
                    case 'services': 
                        $pageController = new ServicesController();
                        $pageController->route();
                        break;
                    case 'openinghours': 
                        $pageController = new OpeningHoursController();
                        $pageController->route();
                        break;
                    case 'user': 
                        $pageController = new UserController();
                        $pageController->route();
                        break;
                    default : 
                        throw new \Exception("Le controleur n'existe pas");
                        break;
                }
            } else {
                // chargement de la page d'accueil si pas de controller dans l'url
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e){
            $this->render('errors/default', [
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
                throw new \Exception("Fichier non trouvé :".$filePath);

            } else {
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

}
