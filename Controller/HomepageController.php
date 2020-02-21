<?php
declare(strict_types = 1);

require "Model/Guestbook.php";
require "Model/Post.php";

class HomepageController
{
    public function render()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nameInput = $_POST["name"];
            $titleInput = $_POST["title"];
            $commentInput = $_POST["comment"];
            $dateInput = date('m/d/Y h:i:s a', time());

            $entry = new Post($titleInput, $commentInput, $dateInput, $nameInput);
            //var_dump($entry);
            $assoc = $entry->createEntryArray($titleInput, $commentInput, $dateInput, $nameInput);
            //var_dump($assoc);


            $book = new Guestbook();

            if (!isset($_SESSION["guestBook"])){
                $_SESSION["guestBook"] = $book;
            }
            else {
                $book = $_SESSION["guestBook"];
            }

            $book->pushToMaster($assoc);
            $masterArray = $book->getAllPosts();

            $book->messageLoader($masterArray);

            $revJSON = $book->loaderDecoder();
        }

        function whatIsHappening()
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
        whatIsHappening();

        require 'View/homepage.php';
    }
}