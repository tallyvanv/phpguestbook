<?php

class Post
{
    private $title;
    private $date;
    private $content;
    private $authorName;

    public function __construct($authorName, $title, $content, $date)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->authorName = $authorName;
    }
}
