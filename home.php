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

                $result = $conn->query("SELECT * FROM news"); 
                //$result (= mysqli_query($conn, $sql);

                if(!$result)
                {
                    echo 'The NEWS could not be displayed, please try again later.' . mysqli_error($conn);
                }
                else
                {

                    while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<br><h2 style="color:black; text-align:left;">' . $row['news_title'] . '</h2><br>';
                            echo $row['news_content'];
                            //echo $row['news_id'];    
                        
                        ?> 
                <form method="post" action="">
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
                        echo '<p></p>';
                        echo '<p></p>';
                        echo '<hr>';
                        
                        }

                }
                
               // if($_SESSION['user_level']==1){

                ?> 
            
    
    
            
            <div style="text-align:center;">
            <button class="button3" style="float: right; display: block;" onclick="toggleEdit()">Add new Event</button>
            
            <div class="news_input" style="display: none;" id="myDIV">
                <!-- create event -->
                    <form method="post" action="">
                    Title:<br><input class="text-input" type="text" name="news-title" style="max-height: 30px; width: 100%;"><br>
                    Announement:<br><textarea name="news-content" style="max-height: 100px; width: 100%;"></textarea>
                    <input class="button3" type="submit" name="submit" value="Submit" />
                        
                    </form>  
                   
                </div>
        </div>
    </div>
        </div>
    
            <?php  
    
              //  }
        
        
        
        if(isset($_POST['submit'])){
            
            $sql = "INSERT INTO news (news_title, news_content, news_date) VALUES ('" . $_POST['news-title'] . "', '" . $_POST['news-content'] . "', CURRENT_TIMESTAMP);";
            
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