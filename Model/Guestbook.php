<?php


class Guestbook
{
    private $objectArray = [];

    public function createObjectArray($authorName, $title, $content, $date)
    {
        array_push($this->objectArray, new Post($authorName, $title, $content, $date));
    }

/*    public function messageLoader()
    {
        
    }*/
}