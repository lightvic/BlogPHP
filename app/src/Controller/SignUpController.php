<?php

namespace App\Controller;

use App\Entity\SignUp;
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

        $NewUser = [
            "email" => $_POST["email"],
            "nickname" => $_POST["nickname"],
            "password" => hash('ripemd160',$_POST["password"]),
            "confirm_password" => hash('ripemd160',$_POST["confirmPassword"]),
        ];


        if ($NewUser["password"] == $NewUser["confirm_password"]){

            $sign_up = new SignUp($NewUser);
            $manager = new SignUpManager (new PDOFactory());
            
            $signup = $manager->insertUser($sign_up);
            header("Location: /");
            exit;
        }
        else{
            $this->home();
        }
    }
}
