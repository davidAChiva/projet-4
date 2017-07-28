<?php
class ControllerOptionAdmin
{
    private $getOption;
    
    public function __construct ($option)
    {
        $this->getOption = $option;
    }
    
    function displayOption ()
    {
        if ($this->getOption === 'newEpisode')
        {
            require_once 'View/ViewCreateEpisode.php';
        }
    }
}