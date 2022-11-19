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
    public function setNickname(){
        $this->nickname = nickname;
        return $this;
    }

    public function getEmail() : string
    {
        return $this->password;
    }
    public function setEmail(){
        $this->nickname = filter_input(INPUT_POST, "email");
        return $this;
    }


    public function getPassword() : string
    {
        return $this->password;
    }
    public function setPassword(){
        $this->password = hash('ripemd160',filter_input(INPUT_POST, "password"));
        return $this;
    }

    public function getConfirmPassword() : string
    {
        return $this->password;
    }
    public function setConfirmPassword(){
        $this->nickname = filter_input(INPUT_POST, "confirmPassword");
        return $this;
    }
}
