<?php
declare(strict_types=1);

require "Model/Guestbook.php";
require "Model/Post.php";

class HomepageController
{

    public function render()
    {
        $badWords = array (
            'ass',
            'cunt',
            'twat',
            'arse',
            'fuck',
            'ballsack',
            'dumb diaper baby',
            'dick'
        );


        function fixTags($text)
        {
            $text = htmlspecialchars($text);
            $text = preg_replace("/=/", "=\"\"", $text);
            $text = preg_replace("/&quot;/", "&quot;\"", $text);
            $tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
            $replacement = "<$1$2$3$4$5$6$7$8$9$10>";
            $text = preg_replace($tags, $replacement, $text);
            $text = preg_replace("/=\"\"/", "=", $text);
            return $text;
        }

        $swearCheck = array(fixTags($_POST["name"]),
            fixTags($_POST["title"]), fixTags($_POST["comment"]));

        $swearWords = array_intersect($badWords, $swearCheck);

        var_dump($swearWords);

        $nameInput = fixTags($_POST["name"]);
        $titleInput = fixTags($_POST["title"]);
        $commentInput = fixTags($_POST["comment"]);
        $dateInput = date('m/d/Y h:i:s a', time());

        $entry = new Post($titleInput, $commentInput, $dateInput, $nameInput);
        //var_dump($entry);
        $assoc = $entry->createEntryArray($titleInput, $commentInput, $dateInput, $nameInput);
        //var_dump($assoc);


        $book = new Guestbook();

        if (!isset($_SESSION["guestBook"])) {
            $_SESSION["guestBook"] = $book;
        } else {
            $book = $_SESSION["guestBook"];
        }

        $book->pushToMaster($assoc);
        $masterArray = $book->getAllPosts();

        $book->messageLoader($masterArray);

        $revJSON = $book->loaderDecoder();

        while (count($revJSON) > 20) {
            array_shift($revJSON);
        }
        $dateOrderPosts = array_reverse($revJSON);

        require 'View/homepage.php';


        /*        function whatIsHappening()
                  {
                      echo '<h2>$_GET</h2>';
                      var_dump($_GET);
                      echo '<h2>$_POST</h2>';
                      var_dump($_POST);
                      echo '<h2>$_COOKIE</h2>';
                      var_dump($_COOKIE);
                      echo '<h2>$_SESSION</h2>';
                      var_dump($_SESSION);
                  }
                whatIsHappening();*/


    }
}