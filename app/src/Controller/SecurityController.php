<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

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
        $user = $userManager->getByUsername($user["nickname"]);

        if (!$user) {
            header("Location: /?error=notfound");
            exit;
        }

        if ($user->passwordMatch($formPwd)) {

            $this->render("logged.php", [
                "message" => "je suis un message"
            ],
                "titre de la page");
        }

    //     header("Location: /?error=notfound");
    //     exit;
     }
}
