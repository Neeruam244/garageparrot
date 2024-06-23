<?php

namespace App\Model; 

use App\Entity\Services;
use App\Repository\ServicesRepository;

class ServicesModel {
    private $servicesRepository;

    public function __construct($servicesRepository) {
        $this->servicesRepository = $servicesRepository;
    }

    public function addServices($title, $text_presentation, $list, $picture) {
        return $this->servicesRepository->addServices($title, $text_presentation, $list, $picture);
    }

    public function updateServices($services) {
        return $this->servicesRepository->updateServices($services);
    }

    public function getServiceById($id_service) {
        return $this->servicesRepository->findOneById($id_service);
    }
}
