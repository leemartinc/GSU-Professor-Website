<?php
//forum.php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

    


echo '<a href="/forum/create_cat.php">Create Category</a></br>';
echo '<a href="/forum/create_topic.php">Create Topic</a>';
 
$sql = "SELECT cat_id, cat_name, cat_description FROM categories";
 
$result = mysqli_query($conn, $sql);
 
if($result)
{
    
    
    if(mysqli_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
        //prepare the table
        echo '<table class="table-fill">
              <tr>
                <th>Category</th>
                <th>Last topic</th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="/forum/topics.php?id= '. $row['cat_id'] .' ">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];
                echo '</td>';
                echo '<td class="rightpart">';
                            echo '<a href="/forum/posts.php?id=  ' . $row['topic_id'] . ' ">Topic subject</a> at 10-10';
                echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
                   
    }
}
   
else
{
     echo 'The categories could not be displayed, please try again later.';
}

 
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>