<?php

namespace App\Model; 

use App\Entity\user;
use App\Repository\UserRepository;

class UserModel {
    private $userRepository;

    public function __construct($userRepository) {
        $this->userRepository = $userRepository;
    }

    public function addUser($firstname, $lastname, $email, $hashed_password, $role) {
        return $this->userRepository->addUser($firstname, $lastname, $email, $hashed_password, $role);
    }

    public function updateUser(User $user) {
        return $this->userRepository->updateUser($user);
    }

    public function getUserById($id_user) {
        return $this->userRepository->findOneById($id_user);
    }
}

