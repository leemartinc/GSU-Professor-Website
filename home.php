<?php
include 'connect.php';
include 'header.php';

?>


<h1>Computer Science</h1>
        <div class="raoface">
            <img src="https://grid.cs.gsu.edu/~ncasturi1/125.JPG" alt="Rao Face"/>
            <h5>Research Interests:</h5>
                <p>My area of interests are in Database systems, Design, Modeling and Distributed Database computations along with Software Engineering. I also work on research topics which analyze in efficient and cost effective Data Warehouse frameworks and Data Mining.</p>
            <h6>Publications:</h6>
                <p>Rao Casturi, "Effective Aggregation - Precursor for Enterprise Data Mining Frameworks." "International Journal of Emerging Technology & Advanced Engineering (ISSN 2250-2459, ISO 9001:2008 Certified Journal), Volume 5, Issue 12, December, 2015. Pages:16-24</p>
                <p>Rao Casturi, "Design and Development of an Efficient Calculation Framework for Internal Rate of Return (IRR) of a Fixed Income Portfolio with SIMD Architecture." "International Journal of Emerging Technology & Advanced Engineering (ISSN 2250-2459, ISO 9001:2008 Certified Journal), Volume 4, Issue 9, September, 2014. Pages:17-22</p>
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
    
            <h2 style="color:black;">News Announcement</h2>
    <div style="display: inline-block;">
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
                            echo $row['news_content'] . '<br>';
                        }

                }

                ?> 
            </div>
    
    
            

            <button class="button3" style="float: right; display: inline-block;" onclick="toggleEdit()">Add new Event</button>
            
            <div class="news_input" style="display: none;" id="myDIV">
                <!-- create event -->
                    <form method="post" action="#">
                    Title:<br><textarea name="news-title" style="max-height: 30px; width: 100%;"></textarea><br>
                    Announement:<br><textarea name="news-content" style="max-height: 100px; width: 100%;"></textarea>
                    <input class="button3" type="submit" name="submit" value="Update Post" />
                    </form>  
                   
                </div>
    </div>
    
            <?php  
        
        
        
        if(isset($_POST['submit'])){
            
            $sql = "INSERT INTO news (news_title, news_content, news_date) VALUES ('" . $_POST['news-title'] . "', '" . $_POST['news-content'] . "', CURRENT_TIMESTAMP);";
            
            $result = mysqli_query($conn, $sql);
                         
        if(!$result)
        {
            echo 'Your news has not been saved, please try again later.'. mysqli_error($conn);
        }
        else
        {
             header("Refresh:0");
        } 
            
        }
        
        ?>
        </div>
    









<?php

include 'footer.php';

    ?>