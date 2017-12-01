
</div><!-- content -->
</div><!-- wrapper -->


<!------------------------------------------------------LIVE CHAT---------------------------------------------------TEMPORARILY DISABLED>
<script>
function myFunction() {
    var z = document.getElementById("chatOps")
z.classList.toggle("change");
}
</script>
<script>
function toggleChatWindow() {
    var x = document.getElementById("chatWindow");
    var y = document.getElementById("chatOptions");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
        if(y.style.display === "block"){
             y.style.display = "none";
            var z = document.getElementById("chatOps")
            z.classList.toggle("change");
           }
    }
}
</script>  
<script>
function toggleChatOptions() {
    var x = document.getElementById("chatOptions");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script> 

<script>
$(document).ready(function() {
    $("input[name$='select_divChat']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#choice" + test).show();
    });
});
</script>


<div class="chat-window" style="display: none;" id="chatWindow"> 
    
<div class="chat-window-close" id="close" style="display: inline-block; cursor: pointer;" onclick="toggleChatWindow();">
</div>    
    
<div id="chatOps" style="display: inline-block; cursor: pointer;" onclick="toggleChatOptions(); myFunction();">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>

    <?php
    
//    $sqlchats = "SELECT * FROM allusers ORDER BY name";
//         
//        $resultchats = mysqli_query($conn, $sqlchats);
//    ?>
//
//                
//                <?php
//                if(!$resultchats)
//        {
//            echo 'The chats could not be displayed, please try again later.' . mysqli_error($conn);
//        }
//        else
//        {
//                             
//            while($row = mysqli_fetch_assoc($resultchats))
//            {               
//                
//                echo '<div id="choice' . $row['userid'] . '" class="desc" style="display: none;">
//                       you are in the div of user id ' . $row['userid'] . '
//                </div>';
//                
//            }
//                
//        }
              ?>  
                
            </div>
        </div>
    </div>
    <div class="chat-window-footer">
        <textarea class="chat-window-text-area" id="chatInput" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" onkeypress="enter(event)">Please enter a message...
        </textarea>
        <button class="chat-window-send" id="chatSend" onclick="reply()"></button>
    </div>
</div>

<div class="chat-options" id="chatOptions" style="display: none;">
<div class="chat-options-header">Select a user</div>
    <?php
//       $sql = "SELECT * FROM allusers ORDER BY name";
//         
//        $result = mysqli_query($conn, $sql);
//         
//        if(!$result)
//        {
//            echo 'The users could not be displayed, please try again later.' . mysqli_error($conn);
//        }
//        else
//        {
//                             if(mysqli_num_rows($result) == 0)
//                    {
//                        echo 'No users available yet.';
//                    }
//                    else
//                    {
//                        //prepare the table
//                        echo '<table class="table-fill" Style="margin-top: 50px;">
//                              <tr>
//                                    
//                              </tr>'; 
//                        
//                        echo "<form id='select__user'>";
//                        while($row = mysqli_fetch_assoc($result))
//                        {               
//                            echo '<tr>';
//                                echo '<td class="leftpart">';
//                                    echo $row['name'];
//                                    //select button
//                                    ?>
<!--//                                        <input name="select_divChat" id="choice<?//php echo $row['userid']; ?>" value="<?//php echo $row['userid']; ?>" type="radio" style="float: right;" />-->
//                                    <?php
//                                echo '</td>';
//                            echo '</tr>';
//                        }
//                        echo '</table>';
//                        echo "</form>";
//
//                    }
//        }
    
    ?>
    
    
    
</div>

<img class="chat-icon" src="/images/chat.jpg" width="80px" height="80px" id="livechat_icon" onclick="toggleChatWindow();">

<!--jQuery--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<!--popper.js--
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<!--myJavaScript.js--
<script src="/LiveChat/js2.js" type="text/javascript" charset="utf-8" async defer></script>
<!--twitterBootstrap--
<script src="/LiveChat/bootstrap/js/bootstrap.min.js"></script>

--------------------------------------------------------------------------------------------------------------->


<div id="footer"></div>
</body>
<div class="footerbar">
        </div>
</html>