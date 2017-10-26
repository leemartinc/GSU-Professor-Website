<?php
//create_cat.php
include 'connect.php';
include 'header.php';
 
//first select the category based on $_GET['cat_id']

$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = $conn->query("SELECT topic_id, topic_subject FROM topics WHERE topic_id = '$id' "); 
//$result (= mysqli_query($conn, $sql);
 
if(!$result)
{
    echo 'The topic could not be displayed, please try again later.' . mysqli_error($conn);
}
else
{
    if($result->num_rows == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<h2> Current topic is ′' . $row['topic_subject'] . '′</h2>';
        }
     
        //do a query for the topics
        $sql = "SELECT
    posts.post_topic,
    posts.post_content,
    posts.post_date,
    posts.post_by,
    allusers.userid,
    allusers.name
FROM
    posts
LEFT JOIN
    allusers
ON
    posts.post_by = allusers.userid
WHERE
    posts.post_topic = '$id' ";
         
        $result = mysqli_query($conn, $sql);
         
        if(!$result)
        {
            echo 'The posts could not be displayed, please try again later.' . mysqli_error($conn);
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no posts in this topic yet.';
            }
            else
            {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>User</th>
                        <th>Posts</th>
                      </tr>'; 
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3>User: "'. $row['name'] .'" </br>
                            <h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo '<h3>"'. $row['post_content'] .'"
                            </h3>';
                        echo '</td>';
                    echo '</tr>';
                    
                }
            }
        }
    }
}


echo '
                    <form method="post" action="reply.php?id= '. $id .'">
    <textarea name="reply-content"></textarea>
    <input type="submit" value="Submit reply" />
</form>
                    ';

 
include 'footer.php';
?>