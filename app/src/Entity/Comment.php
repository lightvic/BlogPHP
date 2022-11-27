<?php

namespace App\Entity;

class Comment extends BaseEntity
{
    private int $id;
    private string $user;
    private string $content;
    private string $post;
    private string $parent_comment;
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }
    public function getUser() : string
    {
        return $this->user;
    }
    public function setUser(string $user): Comment
    {
        $this->user = $user;
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
    public function getPost() : string
    {
        return $this->post;
    }
    public function setPost(string $post): Comment
    {
        $this->post = $post;
        return $this;
    }
    }