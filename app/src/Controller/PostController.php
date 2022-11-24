<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Entity\Post;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;
session_start();

class PostController extends AbstractController
{



    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        if($_SESSION==null){
            header("Location: /login");
            exit;
        }
		echo "Coucou du PostController";
        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();

        $userManager = new UserManager(new PDOFactory());
        $users = $userManager->getAllUsers();
        $admins = $userManager->getAllAdmins();
		
        $this->render("home.php", [
            "posts" => $posts,
            "users" => $users,
            "admins" => $admins,
            "trucs" => "Truc qui s'afichera dans le h1 de home.php",
            "machin" => "2e truc qui s'affichera dans home.php"
        ], "Titre de l'onglet");
    }

	#[Route('/', name: "createNewPost", methods: ["POST"])]
	public function createNewPost()
	{
		$content = $_POST["content"];
		if($content != null && $content !="")
		{
			$userManager = new UserManager(new PDOFactory());
        	$user = $userManager->getByUsername($_SESSION["user"]["nickname"]);
			$userId = $user->getId();

			$data = ['user'=>$userId, 'content'=>$content];
			var_dump($data);
			$post = new Post($data);
			$manager = new PostManager(new PDOFactory());
			$newPost = $manager->insertPost($post);
			
			// code de Victorien : Ne fonctionne pas car $_SESSION["user"] n'a pas de clé "id" pour l'instant.
			// Je laisse quand-même le code ici pour plus tard.

			// $user = $_SESSION["user"]["id"];		// d'office, pour l'instant, en attendant d'avoir la connexion
			// $data = ['user'=>$user, 'content'=>$content];
			// var_dump($data);
			// $post = new Post($data);
			// $manager = new PostManager(new PDOFactory());
			// $newPost = $manager->insertPost($post);
		}
		$this->home();
	}

    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */
    #[Route('/post/{id}/{truc}/{machin}', name: "francis", methods: ["GET"])]
    public function showOne($id, $truc, $machin)
    {
        var_dump($id, $truc);
    }
    
}
