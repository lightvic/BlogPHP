<?php

session_start();

#[Route('/deconnexion', name: "homepage", methods: ["GET"])]

public function home(){
    $_SESSION = null;
    header("Location: /login");
}