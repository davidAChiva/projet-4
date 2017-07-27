<?php

require_once "Model/ConnexionAdmin.class.php";

class ControllerConnexionAdmin
{
    private $checkLoginAdmin;
    
    public function __construct()
    {
        $this->checkLoginAdmin = new ConnexionAdmin();
    }
    
    // Récupére les identifiants saisis
    public function controlLogin($pseudoAdmin,$passwordAdmin)
    {
        $loginAdmin = $this->checkLoginAdmin->getLoginAdmin($pseudoAdmin, $passwordAdmin);
        return $loginAdmin;
    }

}
?>