
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
      
    
    <div class="chat-window-header">FOOBAR</div>
    <div class="chat-window-history-holder">
        <div class="chat-window-history">
            <div class="chat-window-reply-holder">
                <div class="chat-window-other-user">
                Eggs
                </div>
                <div class="chat-window-other-reply">
                swaginess is the key to all swag
                </div>
                <div class="chat-window-user-name">
                me
                </div>
                <div class="chat-window-user-reply">
                You are wrong sir!
                </div>
            </div>
        </div>
    </div>
    <div class="chat-window-footer">
        <textarea class="chat-window-text-area" id="reply_text" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" onkeypress="enter(event)">Please enter a message...
        </textarea>
        <button class="chat-window-send" id="submit-reply" onclick="reply()"></button>
    </div>
</div>

<div class="chat-options" id="chatOptions" style="display: none;">
<div class="chat-options-header">Select a user</div>
</div>

<img class="chat-icon" src="/images/chat.jpg" width="80px" height="80px" id="livechat_icon" onclick="toggleChatWindow();">

<!-------------------------------------------------------------------------------------------------------------------->


<div id="footer"></div>
</body>
<div class="footerbar">
        </div>
</html>