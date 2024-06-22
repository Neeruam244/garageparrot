<?php

namespace App\Model; 

use App\Repository\UserRepository;

class UserModel {
    private $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function addUser($firstname, $lastname, $email, $hashed_password, $role) {
        return $this->userRepository->addUser($firstname, $lastname, $email, $hashed_password, $role);
    }
}

