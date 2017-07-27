<?php
require_once '../Framework/Model.class.php';

class ConnexionAdmin extends Model
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
}