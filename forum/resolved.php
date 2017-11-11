<?php
//create_cat.php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';


$topic_id = mysqli_real_escape_string($conn, $_GET['topicid']);
$post_id = mysqli_real_escape_string($conn, $_GET['postid']);

$sql = "SELECT
    topics.topic_id,
    topics.topic_subject,
    topics.topic_date,
    topics.topic_cat,
    topics.topic_by,
    allusers.userid,
    allusers.name
FROM
    topics
LEFT JOIN
    allusers
ON
    topics.topic_by = allusers.userid
WHERE
    topics.topic_id = '$topic_id' ";


$result = mysqli_query($conn, $sql);
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //someone is calling the file directly, which we don't want
    echo 'This file cannot be called directly.';
}
else if (!$result){echo 'Unable to capture post.'. mysqli_error($conn);}
else
{
    while($row = mysqli_fetch_assoc($result))
                {  
    
    //check for sign in status
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to mark as resolved.';
    }
    else if ($_SESSION['user_id'] != $row['topic_by'])
    { 
        echo 'only the person that created the post can mark the post as resolved. <a href="/forum/posts.php?id='. $topic_id . '">Go Back</a>.';
        //SanityCheck
       // echo 'is'. $_SESSION['user_id'];
       // echo 'by'. $row['topic_by'];
    }
    else{
        //a real user posted a real reply
//        $sql = "INSERT INTO posts(post_content, post_date, post_topic, post_by) VALUES ('" . $_POST['reply-content'] . "', CURRENT_TIMESTAMP, '" . mysqli_real_escape_string($conn, $_GET['id']) . "', '" . $_SESSION['user_id'] . "');";
        
//        $sql = "UPDATE posts SET post_content = '" . $_POST['edit-content'] . "' WHERE post_id = '" . mysqli_real_escape_string($conn, $_GET['id']) . "';";
//                         
//        $result = mysqli_query($conn, $sql);
//                         
//        if(!$result)
//        {
//            echo 'Your reply has not been saved, please try again later.'. mysqli_error($conn);
//        }
//        else
//        {
//            echo 'Your topic has been marked as Resolved, check out <a href="/forum/posts.php?id=' . htmlentities($_GET['prev']) . '">the topic</a>. </br> Even though its resolved, users can still post in case there are updates';
//        }
        
        $sql = "SELECT
    posts.post_topic,
    posts.post_content,
    posts.post_date,
    posts.post_by,
    posts.post_id,
    posts.post_rez,
    allusers.userid,
    allusers.name
FROM
    posts
LEFT JOIN
    allusers
ON
    posts.post_by = allusers.userid
WHERE
    posts.post_topic = '$topic_id' ";
         
        $result = mysqli_query($conn, $sql);
        
        
        
    echo 'You are about to mark the topic you have created as Resolved with the following post as the resolution. <p></p>';

        
                    while($row = mysqli_fetch_assoc($result))
                    {
                        
                       if($row['post_id'] == $post_id){
                           ?>

<div style="background: lightgray;"><h2 style="background: lightgray; color: black; text-align: left;" ><?php echo $row['post_content'] ?></h2></div>
                               
                               
                               <?php
                       }
                        
                    }
        echo "<br>";
        
        echo "If this is the correct post, mark the check box and hit continue.";
        
        
        ?>
<p></p>

<form action="#" method="post">
<div class="wrapper">
    
      <label for="myCheckBox">confirmation:</label>
      <span><input name="myCheckBox" id="myCheckBox" type="checkbox" value="true"></span>
      <div class="clearboth"></div>
    
</div>
    <p></p>
<input class="button" type="submit" name="submit" value="continue">
</form>
        
 <?php 
        
        if(isset($_POST['submit'])){
            if(isset($_POST['myCheckBox'])){
                
                //sql stuff
                 $sql = "UPDATE posts SET post_rez = '1' WHERE post_id = '" . $post_id . "';";
                         
        $result = mysqli_query($conn, $sql);
                         
        if(!$result)
        {
            echo 'Your post has not been saved, please try again later.'. mysqli_error($conn);
        }
        else
        {
            echo 'Your topic has been marked as Resolved. Check out <a href="/forum/posts.php?id=' . htmlentities($_GET['topicid']) . '">the topic</a>.';
        }
                
            }else{
                echo 'You did not confirm the action.';
            }
        }
        
    }
    }
}
 
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>