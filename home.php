<?php
include 'connect.php';
include 'header.php';
?>


<h1>Computer Science</h1>
        <div class="leftfrontpage">
            <img src="https://grid.cs.gsu.edu/~ncasturi1/125.JPG" alt="Rao Face"/>
            <h5>Research Interests:</h5>
                <p>My area of interests are in Database systems, Design, Modeling and Distributed Database computations along with Software Engineering. I also work on research topics which analyze in efficient and cost effective Data Warehouse frameworks and Data Mining.</p>
            
            <h6>Publications:</h6>
                <p>Rao Casturi, "Effective Aggregation - Precursor for Enterprise Data Mining Frameworks." "International Journal of Emerging Technology & Advanced Engineering (ISSN 2250-2459, ISO 9001:2008 Certified Journal), Volume 5, Issue 12, December, 2015. Pages:16-24</p>
                <p>Rao Casturi, "Design and Development of an Efficient Calculation Framework for Internal Rate of Return (IRR) of a Fixed Income Portfolio with SIMD Architecture." "International Journal of Emerging Technology & Advanced Engineering (ISSN 2250-2459, ISO 9001:2008 Certified Journal), Volume 4, Issue 9, September, 2014. Pages:17-22</p>
        </div>
<div class="rightfrontpage">
<h2 style="color: darkblue;">Quick Links</h2>
<br>
<button class="button" style="display: inline-block;" >foobar Link 1</button>    
<button class="button" style="display: inline-block;" >foobar Link 2</button> 
<button class="button" style="display: inline-block;" >foobar Link 3</button> 
<button class="button" style="display: inline-block;" >foobar Link 4</button> 
<button class="button" style="display: inline-block;" >foobar Link 5</button> 
<button class="button" style="display: inline-block;" >foobar Link 6</button> 

</div>

        <script>
function toggleEdit() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "inline-block";
    } else {
        x.style.display = "none";
    }
}
</script>

<div class="news">
            <h2 style="color:black;">News & Announcement</h2>
    <div>
            <div>
                <?php  
                $result = $conn->query("SELECT * FROM news ORDER BY news_id DESC;"); 
                //$result (= mysqli_query($conn, $sql);
                if(!$result)
                {
                    echo 'The NEWS could not be displayed, please try again later.' . mysqli_error($conn);
                }
                else
                {
                    while($row = mysqli_fetch_assoc($result))
                        {
                        
                         echo '<p></p>';
                        echo '<hr>';
                        echo '<p></p>';
                            echo '<br><h2 style="color:black; text-align:left;">' . $row['news_title'] . ' - ' . $row['news_date'] . '</h2><br>';
                            echo $row['news_content'];
                            //echo $row['news_id'];    
                          //if($_SESSION['user_level']==1){
                        
                        ?> 
                
<!-------------------------------------------------------- DELETE NEWS ----------------------------------------------------------->   
                <form method="post" action="" id="deleteForm" onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                <input class="button3" type="submit" style="display: inline-block;" name="delete<?php echo $row['news_id'] ?>" value="Delete this news" />
                </form>
                <?php
                            $deletename = 'delete' . $row['news_id'];
                       // echo $deletename;
                            if(isset($_POST[$deletename])){
                                
                                $prep = "DELETE FROM news WHERE news_id='" . $row['news_id'] . "'";
                                $command = mysqli_query($conn, $prep);
                                
                                if(!$command)
                                    {
                                        echo 'Your news has not been deleted, please try again later.'. mysqli_error($conn);
                                    }
                                    else
                                    {
                                         echo "<meta http-equiv='refresh' content='0'>";
                                    }
                            }
                        ?>
<!-------------------------------------------------------- EDIT NEWS ----------------------------------------------------------->                
<script>
function toggleEdit<?php echo $row['news_id'] ?>() {
    var x = document.getElementById("myDIV<?php echo $row['news_id'] ?>");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<button class="button3" style="display: inline-block;" onclick="toggleEdit<?php echo $row['news_id'] ?>()">edit</button>
 
    
    <!----  hidden forum edit text field  ---->
                <div style="display: none;" id="myDIV<?php echo $row['news_id'] ?>">
                    <form method="post" action="">
                    <textarea class="textareaforum" name="edit-content" style="max-height: 100px;"><?php echo $row['news_content'] ?></textarea>
                    <input class="button3" type="submit" name="edit<?php echo $row['news_id'] ?>" value="Update announcement" />
                    </form>  
                   
                </div>
                <?php
                            $editname = 'edit' . $row['news_id'];
                            if(isset($_POST[$editname])){
                                $prep = "UPDATE news SET news_content = '" . $_POST['edit-content'] . "' WHERE news_id = '" . $row['news_id'] . "';";
                                $command = mysqli_query($conn, $prep);
                                
                                if(!$command)
                                    {
                                        echo 'Your news has not been updated, please try again later.'. mysqli_error($conn);
                                    }
                                    else
                                    {
                                         echo "<meta http-equiv='refresh' content='0'>";
                                    }
                            }
                        ?>
<!-----------------------------------------------------------------------------------------------------------------------------> 
                
                <?php
                        }
                }
                
              
                ?> 

    
<!-------------------------------------------------------- ADD NEWS ----------------------------------------------------------->    
            <hr>
            <div style="text-align:right;">
            <button class="button3" style="display: inline-block;" onclick="toggleEdit()">Add new Event</button>
            </div>
            <div style="display: none; text-align:center;" id="myDIV">
                <!-- create event -->
                    <form method="post" action="">
                    Title:<br><input class="text-input" type="text" name="news-title" style="max-height: 30px; width: 100%;"><br>
                    Announement:<br><textarea name="news-content" style="max-height: 100px; width: 100%;"></textarea>
                    <input class="button3" type="submit" name="submit" value="Submit" />
                        
                    </form>  
                   
                </div>
        
    </div>
        </div>
    
            <?php  
    
              //  }
        
        
        
        if(isset($_POST['submit'])){
            
            $sql = "INSERT INTO news (news_title, news_content, news_date) VALUES ('" . $_POST['news-title'] . "', '" . $_POST['news-content'] . "', date_format(curdate(), '%W, %M %d, %Y'));";
            
            $result = mysqli_query($conn, $sql);
                         
        if(!$result)
        {
            echo 'Your news has not been saved, please try again later.'. mysqli_error($conn);
        }
        else
        {
             echo "<meta http-equiv='refresh' content='0'>";
        } 
            
        }
        
        ?>
        </div>
    









<?php
include 'footer.php';
    ?>