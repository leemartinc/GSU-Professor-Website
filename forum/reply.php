<?php
//create_cat.php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
}
else
{
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        $input = $_POST['reply-content'];
$safe_input = addslashes($input);
        //a real user posted a real reply
        $sql = "INSERT INTO posts(post_content, post_date, post_topic, post_by) VALUES ('$safe_input', CURRENT_TIMESTAMP, '" . mysqli_real_escape_string($conn, $_GET['id']) . "', '" . $_SESSION['user_id'] . "');";
                         
        $result = mysqli_query($conn, $sql);
                         
        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.'. mysqli_error($conn);
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="/forum/posts.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
        }
    }
}
 
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>