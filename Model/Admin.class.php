<?php
require_once '../Framework/Model.class.php';

class Admin extends Model
{
    public function getLoginAdmin($pseudoAdmin, $passwordAdmin)
    {
        $sql= 'SELECT id,pseudonym,password FROM login_admin WHERE pseudonym =? AND password =?';
        $loginAdmin = $this->executeRequest($sql,array($pseudoAdmin, $passwordAdmin));
        if ($loginAdmin->rowCount() === 1)
        {
            return $loginAdmin->fetch();
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
}