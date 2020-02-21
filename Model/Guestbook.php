<?php


class Guestbook
{
    private $masterArray = [];

    public function getAllPosts()
    {
        return $this->masterArray;
    }

    public function pushToMaster($session)
    {
        array_push($this->masterArray, $session);
    }

    public function messageLoader($array)
    {
        $data = json_encode($array);
        file_put_contents("data/messages.json",$data);
    }

    public function loaderDecoder()
    {
        $messageArray = json_decode(file_get_contents("data/messages.json"), true);
        return $messageArray;
    }

/*    public function getMessageArray()
    {
        $messageArray = [];
        array_push($messageArray, $this->loaderDecoder());
        return $messageArray;
    }*/
}