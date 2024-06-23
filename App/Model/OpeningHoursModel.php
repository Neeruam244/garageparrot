<?php

namespace App\Model; 

use App\Entity\openingHours;
use App\Repository\OpeningHoursRepository;

class openingHoursModel {
    private $OpeningHoursRepository;

    public function __construct($OpeningHoursRepository) {
        $this->OpeningHoursRepository = $OpeningHoursRepository;
    }

    public function updateOpeningHours($openinghoursData) {
        return $this->OpeningHoursRepository->updateOpeningHours($openinghoursData);
    }

    public function getAllOpeningHours() {
        return $this->OpeningHoursRepository->findAll();
    }
}
