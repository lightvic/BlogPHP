<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Manager\SignUpManager;
use App\Route\Route;
use PDOException;

class SignUpController extends AbstractController{

    #[Route('/signup', name: "signup")]

    public function home()
    {
        $this->render("signup.php", []);
    }
    #[Route('/insert', name: "francis")]
    public function Insert()
    {
    // Je crée une entité Post avec les infos de mon post
    // J'appelle le manager
    // je lui demande d'insérer le nouveau post
    // Je redirige vers la home page

        $NewUser = array(
            "email" => $_POST["email"],
            "nickname" => $_POST["nickname"],
            "password" => $_POST["pasword"],
            "confirm_password" => $_POST["confirm_password"],
        );

        $signupManager = new SignUpManager(new PDOFactory());
    }
}

