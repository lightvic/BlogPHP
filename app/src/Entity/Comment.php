<?php

namespace App\Entity;

class Comment extends BaseEntity
{
    private int $id;
    private int $user;
    private string $content;
    private int $post;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }
    public function getContent() : string
    {
        return $this->content;
    }
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }
    public function getPost() : int
    {
        return $this->post;
    }
    public function setPost(int $post): Comment
    {
        $this->post = $post;
        return $this;
    }
    public function getUser() : int
    {
        return $this->user;
    }
    public function setUser(int $user): Comment
    {
        $this->user = $user;
        return $this;
    }
    }