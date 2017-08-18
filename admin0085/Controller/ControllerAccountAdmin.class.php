<?php
require_once '../Model/Admin.class.php';

class ControllerAccountAdmin
{
    private $accountAdmin;
    
    public function __construct ()
    {
        $this->accountAdmin = new admin;
    }
    
    // Déconnecte le compte et supprimer la session
    public function deconnexion()
    {
        session_destroy();
        header('location:index.php');
    }
}