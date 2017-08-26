<?php
require_once '../Model/Admin.class.php';

class ControllerAccountAdmin
{
    private $accountAdmin;
    
    public function __construct ()
    {
        $this->accountAdmin = new admin;
    }
    // Gére la connexion
    public function connexion()
    {   
        require_once 'View/ViewConnexion.php';
        
        if (isset($_POST['pseudoAdmin']) AND isset($_POST['passwordAdmin']))
        {
            $pseudoKey = htmlspecialchars($_POST['pseudoAdmin']);
            $passwordKey = htmlspecialchars($_POST['passwordAdmin']);

            // hashage du mot de passe envoyé
            $passwordKey=hash('sha512',$passwordKey);

            $checkLogin = $this->controlLogin($pseudoKey,$passwordKey);

            // Controle si le pseudo et mot de passe saisi corresponde à la ligne de la table
            if ($pseudoKey === $checkLogin['pseudonym'] AND $passwordKey === $checkLogin['password'])
            {
                // Enregistrement des informations de connexion dans la session
                $_SESSION['pseudo'] = $pseudoKey;
                $_SESSION['password'] = $passwordKey;
                header('Location: home.php');
            }
        }
    }
    //Gére le changement de pseudo ou mot de passe
    public function manageAccount()
    {
        if (isset($_POST['newPseudo']))
        {
            $newPseudo = strip_tags($_POST['newPseudo']);
            $this->accountAdmin->setNewPseudoAdmin($_SESSION['pseudo'], $newPseudo);
            $_SESSION['pseudo'] = $newPseudo;
        }
        else if ((isset($_POST['oldPassword'])) AND (isset($_POST['newPassword'])) AND (isset($_POST['retypePassword'])))
        {
            $oldPassword = $_POST['oldPassword'];
            $retypePassword =  $_POST['retypePassword'];
            $newPassword = $_POST['newPassword'];
            
            if ($newPassword === $retypePassword)
            {
                $oldPassword = hash('sha512',$oldPassword);
                $loginAdmin = $this->controlLogin($_SESSION['pseudo'], $oldPassword);
                
                if ($loginAdmin['pseudonym'] === $_SESSION['pseudo'] AND $loginAdmin['password'] === $oldPassword)
                {
                    $newPassword = hash('sha512',$newPassword);
                    $this->accountAdmin->setNewPasswordAdmin($_SESSION['pseudo'], $newPassword);
                }
            }
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