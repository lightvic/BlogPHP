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
        $query = $this->pdo->query("select * from post");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Post($data);
        }

        return $users;
    }

	public function insertPost($post)
    {
        $query = $this->pdo->prepare("INSERT INTO post (content, user) VALUES (:content, :user);");
        $query->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
        $query->bindValue("user", $post->getUser(), \PDO::PARAM_INT);
        $query->execute();
		
    }
}
