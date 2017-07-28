<?php
require_once 'Controller/ControllerHomeAdmin.class.php';
require_once 'Controller/ControllerOptionAdmin.class.php';

if (isset($_GET['option']))
{
    $getOptionAdmin = new ControllerOptionAdmin($_GET['option']);
    $getOptionAdmin->displayOption();
    
}
else
{
    $getHomeAdmin = new ControllerHomeAdmin;
    $getHomeAdmin->getHomeAdmin();
}

