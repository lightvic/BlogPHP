<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{
        public function getAllComments($id): array
        {
            $query = $this->pdo->query("SELECT * FROM comment WHERE post = 'id' ORDER BY date DESC");
            $query->bindValue("id", $id, \PDO::PARAM_STR);
            $allComments = [];
            while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
                $allComments[] = new Comment($data);
            }
        return $allComments;
    }
        public function insertComment($comment){
            $query = $this->pdo->prepare("INSERT INTO comment (content, user, post) VALUES (:content, :user, :post);");
            $query->bindValue("content", $comment->getContent(), \PDO::PARAM_STR);
            $query->bindValue("user", $comment->getUser(), \PDO::PARAM_INT);
            $query->bindValue("post", $comment->getPost(), \PDO::PARAM_INT);
        }
}