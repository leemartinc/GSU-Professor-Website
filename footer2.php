
</div><!-- content -->
</div><!-- wrapper -->


<!--------------------------------------------------------LIVE CHAT--------------------------------------------------->
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


<div class="chat-window" style="display: none;" id="chatWindow"> 
    
<div class="chat-window-close" id="close" style="display: inline-block; cursor: pointer;" onclick="toggleChatWindow();">
</div>    
    
<div id="chatOps" style="display: inline-block; cursor: pointer;" onclick="toggleChatOptions(); myFunction();">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
      
    
    <div class="chat-window-header">Live Chat</div>
    <div class="chat-window-history-holder">
        <div class="chat-window-history">
            <div class="chat-window-reply-holder" id="chatOutput">
                <!---loop for auto refrest every 5 seconds--->
                <!---while row sql type thing--->
                 <!---if session != chat user--->
                
                
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
</div>

<img class="chat-icon" src="/images/chat.jpg" width="80px" height="80px" id="livechat_icon" onclick="toggleChatWindow();">

<script>
$(document).ready(function () {
    var chatInterval = 250; //refresh interval in ms
    var $userName = $("<?php $_SESSION['user_name'] ?>");
    var $chatOutput = $("#chatOutput");
    var $chatInput = $("#chatInput");
    var $chatSend = $("#chatSend");

    function sendMessage() {
        var userNameString = $userName.val();
        var chatInputString = $chatInput.val();

        $.get("./live_chat/write.php", {
            username: userNameString,
            text: chatInputString
        });

        $userName.val("");
        retrieveMessages();
    }

    function retrieveMessages() {
        $.get("./live_chat/read.php", function (data) {
            $chatOutput.html(data); //Paste content into chat output
        });
    }

    $chatSend.click(function () {
        sendMessage();
    });

    setInterval(function () {
        retrieveMessages();
    }, chatInterval);
});
</script>

<!-------------------------------------------------------------------------------------------------------------------->


<div id="footer"></div>
</body>
<div class="footerbar">
        </div>
</html>