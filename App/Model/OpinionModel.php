<?php

namespace App\Model; 

use App\Repository\OpinionRepository;

class OpinionModel {
    private $opinionRepository;

    public function __construct($opinionRepository) {
        $this->opinionRepository = $opinionRepository;
    }

    public function addOpinion($client_name, $opinion, $note) {
        return $this->opinionRepository->addOpinion($client_name, $opinion, $note);
    }
}