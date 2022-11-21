<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Entity\Post;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Route\Route;

class PostController extends AbstractController
{
    #[Route('/', name: "homepage", methods: ["GET"])]
    public function home()
    {
        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();



        $this->render("home.php", [
            "posts" => $posts,
            "trucs" => "Truc qui s'afichera dans le h1 de home.php",
            "machin" => "2e truc qui s'affichera dans home.php"
        ], "Titre de l'onglet");
    }

	#[Route('/', name: "createNewPost", methods: ["POST"])]
	public function createNewPost()
	{
		// Je crée une entité Post avec les infos de mon post
		// J'appelle le manager
		// je lui demande d'insérer le nouveau post
		// Je redirige vers la home page
		var_dump($_POST);
		$content = $_POST["content"];
		$user = 1;		// d'office, pour l'instant, en attendant d'avoir la connexion
		$data = ['user'=>$user, 'content'=>$content];
		var_dump($data);
		$post = new Post($data);
		$manager = new PostManager(new PDOFactory());
		$newPost = $manager->insertPost($post);
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
