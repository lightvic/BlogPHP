<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;
use App\Entity\User;

class SecurityController extends AbstractController
{

    #[Route('/login', name: "login")]

    public function home()
    {
        $this->render("login.php", []);
    }
    #[Route('/log', name: "login")]
    public function login()
    {
        $user = [
            "nickname"=>$_POST["nickname"],
            "password"=>hash('ripemd160',$_POST["password"])
        ];

        $userManager = new UserManager(new PDOFactory());
        $user_db = $userManager->getByUsername($user["nickname"]);

        if (!$user) {
            header("Location: /?error=notfound");
            exit;
        }

        if ($user_db->getPassword() === $user["password"]) {
            $user = $user_db;
            $_SESSION["user"] = $user_db;
            header("Location: /");
            exit;
        }
     }

     #[Route('/deconnexion', name: "deconnexion", methods: ["GET"])]
    
     public function deconnexion(){
        $_SESSION = null;
        header("Location: /login");
        }
}
