<?php
//create_cat.php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
 
//first select the category based on $_GET['cat_id']

$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = $conn->query("SELECT * FROM topics WHERE topic_id = '$id' "); 
//$result (= mysqli_query($conn, $sql);


$current = $_SESSION['user_id'];
 
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
            echo '<div class="table-title"><h2> Current topic is ′' . $row['topic_subject'] . '′</h2></div> ';
            $topicBy = $row['topic_by'];
        }
     
        //do a query for the topics
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
    posts.post_topic = '$id' ORDER BY posts.post_date";
         
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
                
                ?>
                
                <table>
                      <tr>
                        <th>User</th>
                        <th>Posts
                            
                        </th>
                      </tr>
                   
                    
                    <?php
                     
                while($row = mysqli_fetch_assoc($result))
                {               
                    echo '<tr>';
                        echo '<td>';
                            echo '<p>'. $row['name'] .' </br>
                            <p>';
                        echo '</td>';
                        echo '<td>';
                    
                            if($row['post_rez'] == 1){ ?>    <!---- check mark ----->  <img src="/images/check-mark.png" alt="resolution" style="width:50px;height:50px;">   <?php }
                    
                            echo '<p>'. $row['post_content'] .'
                            </p>';
                    
                    if($row['post_rez'] == 1){
                        
                        ?>
                        <form method="post" style="float: right; <?php if($topicBy == $_SESSION['user_id']){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>" action="/forum/undo-resolved.php?topicid=<?php echo $id ?>&postid=<?php echo $row['post_id'] ?>">
                        <!-- radio button -->
<input class="button3" style="background: green;  box-shadow: 0 5px 0 darkgreen; float: right;" type="submit" value="Undo Mark of Resolution" 
       style="float: right; <?php if($topicBy == $_SESSION['user_id']){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>">
                    </form>
                    
                    <?php
                        
                    }
                    else{
                        
                    
                    
                    ?>
                    <form method="post" style="float: right; <?php if($topicBy == $_SESSION['user_id']){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>" action="/forum/resolved.php?topicid=<?php echo $id ?>&postid=<?php echo $row['post_id'] ?>">
                        <!-- radio button -->
<input class="button3" style="background: green;  box-shadow: 0 5px 0 darkgreen; float: right;" type="submit" value="Mark as Resolution" 
       style="float: right; <?php if($topicBy == $_SESSION['user_id']){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>">
                    </form>
                    
                        <?php
                        }
                    
                      //sanityCheck    
       // echo 'by'. $topicBy;
        //echo 'is'. $current;  
                    
                    
                    if ($row['name'] == $_SESSION['user_name']){
                        
    ?>


<script>
function toggleEdit<?php echo $row['post_id'] ?>() {
    var x = document.getElementById("myDIV<?php echo $row['post_id'] ?>");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
                  
                    
<div class="forum-functions"> 

 
    
    
<button class="button3" style="float: right; <?php if($row['post_by'] == $_SESSION['user_id']){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>" onclick="toggleEdit<?php echo $row['post_id'] ?>()">edit</button>
    
    
   
    
    <!----  hidden forum edit text field  ---->
                <div style="display: none;" id="myDIV<?php echo $row['post_id'] ?>">
                    <form method="post" action="/forum/editPost.php?id=<?php echo $row['post_id'] ?>&prev=<?php echo $id ?>">
                    <textarea class="textareaforum" name="edit-content" style="max-height: 100px;"><?php echo $row['post_content'] ?></textarea>
                    <input class="button3" type="submit" value="Update Post" />
                    </form>  
                   
                </div>



    
</div> 
    <?php             
                    }

                        echo '</td>';
                    echo '</tr>';
                    
                    
                    
                }
                ?>
               </table>
                <?php
                echo '
                    <form method="post" action="/forum/reply.php?id= '. $id .'">
                    <textarea class="textareaforum" name="reply-content"></textarea>
                    <input class="button" type="submit" value="Submit Reply" />
                    </form>
                    ';
      
            }
            
           echo ' <script>
function goBack() {
    window.history.back()
}


function toggleEdit() {
    var x = document.getElementById("myDIV' . $row['post_id'] . '
");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


</script>
<button style="float: right;" class="button" onclick="goBack()">Go Back</button>
';
            
        }
    }
}




 
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>