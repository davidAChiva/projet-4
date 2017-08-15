<?php

require_once '../Model/Admin.class.php';

class ControllerConnexionAdmin
{
    private $checkLoginAdmin;
    
    public function __construct()
    {
        $this->checkLoginAdmin = new Admin;
    }
    
    // Récupére les identifiants saisis
    public function controlLogin($pseudoAdmin,$passwordAdmin)
    {
        $loginAdmin = $this->checkLoginAdmin->getLoginAdmin($pseudoAdmin, $passwordAdmin);
        return $loginAdmin;
    }
}
