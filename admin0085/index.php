<?php session_start();
require_once 'Controller/ControllerAccountAdmin.class.php';
$ctrlAdmin = new ControllerAccountAdmin;
$ctrlAdmin->connexion();