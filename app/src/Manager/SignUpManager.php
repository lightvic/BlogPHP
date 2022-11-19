<?php

namespace App\Manager;

use App\Entity\SignUp;

class SignUpManager extends BaseManager{
    public function insertUser($sign_up)
    {

        $query = $this->pdo->prepare("INSERT INTO user (password, nickname, email) VALUES (:password, :username, :email)");
        $query->bindValue("password", $sign_up->getPassword(), \PDO::PARAM_STR);
        $query->bindValue("username", $sign_up->getNickname(), \PDO::PARAM_STR);
        $query->bindValue("email", $sign_up->getEmail(), \PDO::PARAM_STR);
        $query->execute();
    }
}