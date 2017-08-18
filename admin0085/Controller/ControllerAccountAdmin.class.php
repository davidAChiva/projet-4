<?php
require_once '../Model/Admin.class.php';

class ControllerAccountAdmin
{
    private $accountAdmin;
    
    public function __construct ()
    {
        $this->accountAdmin = new admin;
    }
    
    // Controle si les identifiants saisis sont correct
    public function controlLogin($pseudoAdmin,$passwordAdmin)
    {
        $loginAdmin = $this->accountAdmin->getLoginAdmin($pseudoAdmin, $passwordAdmin);
        return $loginAdmin;
    }

    // Déconnecte le compte et supprimer la session
    public function deconnexion()
    {
        session_destroy();
        header('location:index.php');
    }
}