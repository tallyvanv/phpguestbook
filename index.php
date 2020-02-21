<?php
//store data in files
//convert complex constructs (array/objects) to string representation

//Any visitor on te page can leave a message on your page that are then saved and showed (last message on top) for everybody who visits the page.

//You can store the messages in a file on your system. You can use the brother of file_get_contents() for this: file_put_contents() .
//You can either use json_encode() or serialize() to convert your array to a string to store.
//Make sure the script can handle site defacement attacks: use htmlspecialchars()


//The messages are sorted from new (top) to old (bottom).
//Only show the latest 20 posts.
?>
<h3> Please sign my guestbook</h3>
<form method="post">

    <b>Please enter your first name:
    </b><input name="username" size="30"> <br>

    <b>and your last name:
    </b><INPUT Name="usermail" size="30">
    <p>


    <h3>Make any comments you'd like below:</h3>
        <textarea name="comment" ROWS=6 COLS=60></TEXTAREA>
        <P>
            <b>Thanks for your input</b>
            <br>

            <input type=submit value="Send it!">
</form>