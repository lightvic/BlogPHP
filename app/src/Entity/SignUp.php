<?php

namespace App\Entity;

class SignUp extends BaseEntity{
    private string $nickname;
    private string $email;
    private string $password;
    private string $confirm_password;

    public function getNickname() : string
    {
        return $this->nickname;
    }
    public function setNickname(string $nickname): SignUp
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail(string $email): SignUp
    {
        $this->email = $email;
        return $this;
    }


    public function getPassword() : string
    {
        return $this->password;
    }
    public function setPassword(string $password): SignUp
    {
        $this->password = $password;
        return $this;
    }

    public function getConfirmPassword() : string
    {
        return $this->confirm_password;
    }
    public function setConfirmPassword(string $confirm_password): SignUp
    {
        $this->confirm_password = $confirm_password;
        return $this;
    }
}
