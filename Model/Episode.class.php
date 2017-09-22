<?php

class Episode
{
    private $idEpisode;
    private $titleEpisode;
    private $contentEpisode;
    private $dateEpisode;
    
    public function getIdEpisode()
    {
        return $this->idEpisode;
    }
    
    public function setIdEpisode($id)
    {
        $this->idEpisode = $id;
        return $this;
    }
    
    public function getTitleEpisode()
    {
        return $this->titleEpisode;
    }
    
    public function setTitleEpisode($title)
    {
        $this->titleEpisode = $title;
        return $this;
    }
    
    public function getContentEpisode()
    {
        return $this->contentEpisode;
    }
    
    public function setContentEpisode($content)
    {
        $this->contentEpisode = $content;
        return $this;
    }
    
    public function getDateEpisode()
    {
        return $this->dateEpisode;
    }
    
    public function setDateEpisode($date)
    {
        $this->dateEpisode = $date;
        return $this;
    }
}