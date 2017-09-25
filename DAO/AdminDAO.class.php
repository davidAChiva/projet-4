<?php
require_once '../Framework/Model.class.php';
require_once '../Model/Admin.class.php';

class AdminDAO extends Model
{
    public function getLoginAdmin($pseudoAdmin, $passwordAdmin)
    {
        $sql= 'SELECT id,pseudonym,password FROM login_admin WHERE pseudonym =? AND password =?';
        $row = $this->executeRequest($sql, array($pseudoAdmin,$passwordAdmin));
        if ($row->rowCount() === 1)
        {
            // Transforme l'objet PDO en tableau
            $loginAdmin = $row->fetch(PDO::FETCH_ASSOC);
            $loginAdmin = $this->buildAdmin($loginAdmin);
            return $loginAdmin;
        }
        else
        {
            throw new Exception("L'identifiant où le mot de passe est incorrect");
        }
    }   
    // change le pseudo du compte d'administration
    public function setNewPseudoAdmin($oldPseudoAdmin, $newPseudoAdmin)
    {
        $sql = 'UPDATE login_admin SET pseudonym=? WHERE pseudonym=?';
        $setNewPseudo = $this->executeRequest($sql,array($newPseudoAdmin,$oldPseudoAdmin));
        return $setNewPseudo;
    }
    // change le mot de passe du compte d'administration
    public function setNewPasswordAdmin($pseudoAdmin, $newPasswordAdmin)
    {
        $sql = 'UPDATE login_admin SET password =? WHERE pseudonym =?';
        $setNewPassword = $this->executeRequest($sql, array($newPasswordAdmin, $pseudoAdmin));
        return $setNewPassword;
    }
    // Crée un objet épisode en se basant sur $row
    // $row est un tableau qui regroupe les informations de l'épisode
    
    private function buildAdmin(array $row)
    {
        $admin = new Admin();
        $admin->setPseudoAdmin($row['pseudonym']);
        $admin->setPasswordAdmin($row['password']);
        return $admin;
    }
}