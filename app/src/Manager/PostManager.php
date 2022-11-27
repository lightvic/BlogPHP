<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("SELECT * FROM post ORDER BY date DESC");
        $allPosts = [];
        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $allPosts[] = new Post($data);
        }
        return $allPosts;
    }

	public function insertPost($post)
    {
        $query = $this->pdo->prepare("INSERT INTO post (content, user) VALUES (:content, :user);");
        $query->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
        $query->bindValue("user", $post->getUser(), \PDO::PARAM_INT);
        $query->execute();
		
    }
	public function modifyPost($post)
    {
        $query = $this->pdo->prepare("UPDATE post SET content=:content WHERE `id`=:id;");
        $query->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
		$query->bindValue("id", $post->getId(), \PDO::PARAM_INT);
        $query->execute();
		
    }
	public function deletePost($postId)
    {
        $query = $this->pdo->prepare("DELETE FROM post WHERE `id`=:id;");
        $query->bindValue("id", $postId, \PDO::PARAM_INT);
        $query->execute();
		
    }
}
