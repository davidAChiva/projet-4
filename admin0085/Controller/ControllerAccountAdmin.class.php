<?php
require_once '../Model/Admin.class.php';

class ControllerAccountAdmin
{
    private $accountAdmin;
    
    public function __construct ()
    {
        $this->accountAdmin = new admin;
    }
    //Gére le changement de pseudo ou mot de passe
    public function manageAccount()
    {
        if (isset($_SESSION['pseudo']) AND (isset($_POST['newPseudo'])))
        {
            $newPseudo = strip_tags($_POST['newPseudo']);
            $this->accountAdmin->setNewPseudoAdmin($_SESSION['pseudo'], $newPseudo);
            $_SESSION['pseudo'] = $newPseudo;
        }
        require_once'View/ViewModifyAccount.php';
        require_once'View/templateAdmin.php';
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