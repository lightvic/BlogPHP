<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Entity\Post;
use App\Entity\Comment;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Manager\PostManager;
use App\Route\Route;
class CommentController extends AbstractController
{
    #[Route('/comment/{id}', name: "showComment", methods:["GET","POST"])]

    public function home($id)
	{

        $manager = new CommentManager(new PDOFactory());
        $comments = $manager->getAllComments($id);

        $this->render("comment.php", [
            "comments" => $comments
        ]);
    }

    #[Route('/comment/{id}', name: "addomment", methods:["GET","POST"])]

    public function addComment($post_id)
	{
        $content = $_POST["content"];
        if($content != null && $content !=""){
			$userManager = new UserManager(new PDOFactory());
            $userId =$_SESSION["user"]->getId();

            $postManager = new PostManager(new PDOFactory());
        	$postManager->getPost($post_id);
			$postId =$_SESSION["user"]->getId();

            $data = ['content'=>$content, 'user'=>$userId, 'post'=>$postId];
            $comment= new Comment($data);
            $manager = new CommentManager(new PDOFactory());
            $newComment= $manager->insertComment($comment);

        }
        $this->home($post_id);
    }
}