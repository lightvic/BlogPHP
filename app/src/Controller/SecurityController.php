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
			// Modifié par val. Normalement, elles doivent marcher. Je vous laisse tester.
            $userId = $user_db["id"];
			$userManager = new UserManager(new PDOFactory());
        	$user = $userManager->getByUsername($_SESSION["user"]["nickname"]);
			$_SESSION["user"]["id"] = $user->getId();
			$_SESSION["user"]["nickname"] = $user->getNickname();
			$_SESSION["user"]["admin"] = $user->getAdmin();
            header("Location: /");
            exit;
        }

    //     header("Location: /?error=notfound");
    //     exit;
     }
}
