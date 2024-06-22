<?php

namespace App\Model; 

use App\Repository\ServicesRepository;

class ServicesModel {
    private $servicesRepository;

    public function __construct($servicesRepository) {
        $this->servicesRepository = $servicesRepository;
    }

    public function addServices($title, $text_presentation, $list, $picture) {
        return $this->servicesRepository->addServices($title, $text_presentation, $list, $picture);
    }
}