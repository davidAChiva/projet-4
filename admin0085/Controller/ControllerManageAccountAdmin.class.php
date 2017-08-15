<?php
class ControllerManageAccountAdmin
{
    private $getManageAccount;
    
    public function __construct ($manageAccount)
    {
        $this->getManageAccount = $manageAccount;
    }
    
    // Affiche la page demandée
    public function displayManageAccount()
    {
        // Déconnecte le compte et supprimer la session
        if ($this->getManageAccount === 'deconnexion')
        {
            session_destroy();
            header('location:index.php');
        }
    }
}