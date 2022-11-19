<?php

namespace App\Manager;

use App\Entity\SignUp;
use App\Entity\User;

class SignUpManager extends BaseManager{
    public function insertUser(SignUp $signUp)
    {

        $query = $this->pdo->prepare("INSERT INTO user (password, username, email) VALUES (:password, :username, :email)");
        $query->bindValue("password", $signUp->getPassword(), \PDO::PARAM_STR);
        $query->bindValue("username", $signUp->getNickname(), \PDO::PARAM_STR);
        $query->bindValue("email", $signUp->getEmail(), \PDO::PARAM_STR);
        $query->execute();
    }
}