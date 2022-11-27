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
        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();

        $userManager = new UserManager(new PDOFactory());
        $users = $userManager->getAllUsers();
        $userNickname = $_SESSION["user"]->getNickname();
        $userIsAdmin = $_SESSION["user"]->getAdmin();
		
        $this->render("home.php", [
            "posts" => $posts,
            "users" => $users,
            "userNickname" => $userNickname,
            "userIsAdmin" => $userIsAdmin,
            "titre1" => "Blog de Victorien Guillerd, Valentine Lefebvre et Jean-Baptiste Migone",
            "titre2" => "Accueil"
        ], "Titre de l'onglet");
    }

	#[Route('/', name: "createNewPost", methods: ["POST"])]
	public function createNewPost()
	{
		$content = $_POST["content"];
		if($content != null && $content !="")
		{
			$userManager = new UserManager(new PDOFactory());
			$userId = $_SESSION["user"]->getId();
						
			$data = ['user'=>$userId, 'content'=>$content];
			$post = new Post($data);
			$manager = new PostManager(new PDOFactory());
			$newPost = $manager->insertPost($post);
		}
		$this->home();
	}

	#[Route('/post/modify/{id}', name: "modifyPost", methods: ["POST"])]
	public function modifyPost($id)
	{
		$content = $_POST["content"];
		if($content != null && $content !="")
		{
			$data = ['id'=>$id, 'content'=>$content];
			$post = new Post($data);
			$manager = new PostManager(new PDOFactory());
			$newPost = $manager->modifyPost($post);
		}
		header("Location: /");
	}

    #[Route('/post/delete/{id}', name: "delete", methods: ["POST"])]
    public function deletePost($id)
    {
		$manager = new PostManager(new PDOFactory());
		$manager->deletePost($id);
		header("Location: /");
    }
}
