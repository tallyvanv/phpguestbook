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

            $entry = new Guestbook();
            $entry->createObjectArray($nameInput, $titleInput, $commentInput, $dateInput);
            var_dump($entry);
        }
        if (!isset($_SESSION["name"])){
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["title"] = $_POST["title"];
            $_SESSION["comment"] = $_POST["comment"];
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