<?php
namespace App\Controller;

use App\Route\Route;


class DeconnexionController extends AbstractController{
    #[Route('/deconnexion', name: "homepage", methods: ["GET"])]
    public function home(){
        $_SESSION = null;
        header("Location: /login");
    }
}