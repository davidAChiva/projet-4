<?php

class Admin
{
    private $pseudoAdmin;
    private $passwordAdmin;
    
    public function getPseudoAdmin()
    {
        return $this->pseudoAdmin;
    }
    
    public function setPseudoAdmin($pseudo)
    {
        $this->pseudoAdmin = $pseudo;
        return $this;
    }
    
    public function getPasswordAdmin()
    {
        return $this->passwordAdmin;
    }
    
    public function setPasswordAdmin($password)
    {
        $this->passwordAdmin = $password;
        return $this;
    }
}