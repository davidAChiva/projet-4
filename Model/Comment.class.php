<?php

class Comment
{
    private $idComment;
    private $authorComment;
    private $contentComment;
    private $dateComment;
    private $idEpisode;
    private $titleEpisode;
    
    public function getIdComment()
    {
        return $this->idComment;
    }
    
    public function setIdComment($id)
    {
        $this->idComment = $id;
        return $this;
    }
    
    public function getAuthorComment()
    {
        return $this->authorComment;
    }
    
    public function setAuthorComment($author)
    {
        $this->authorComment = $author;
        return $this;
    }
    
    public function getContentComment()
    {
        return $this->contentComment;
    }
    
    public function setContentComment($content)
    {
        $this->contentComment = $content;
        return $this;
    }
    
    public function getDateComment()
    {
        return $this->dateComment;
    }
    
    public function setDateComment($date)
    {
        $this->dateComment = $date;
        return $this;
    }

    public function getIdEpisode()
    {
        $this->idEpisode;
    }
    
    public function setIdEpisode($episodeId)
    {
        $this->idEpisode = $episodeId;
        return $this;
    }

    public function getTitleEpisode()
    {
        $this->titleEpisode;
    }
    
    public function setTitleEpisode($title)
    {
        $this->titleEpisode = $title;
        return $this;
    }
}