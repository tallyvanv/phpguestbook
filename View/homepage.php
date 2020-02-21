<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3> Please sign my guestbook</h3>
<form method="post">

    <b>Please enter your name:</b>
    <input name="name" size="30"> <br>


    <h3>Make any comments you'd like below:</h3>
    <b>Title</b>
    <input name="title">
    <textarea name="comment" ROWS=6 COLS=60></TEXTAREA>
    <p>
        <b>Thanks for your input</b>
        <br>
    </p>

    <input type=submit value="Send it!">
</form>
<?php foreach ($dateOrderPosts as $post) :?>
<p><strong><?php echo $post['title']?></strong></p>
<p>Message: <?php echo $post['content']?></p>
<p>Posted on: <?php echo $post['date']?></p>
<p>By: <?php echo $post['name']?></p>
<?php endforeach?>

<div id="playground">
</div>
</body>
</html>

