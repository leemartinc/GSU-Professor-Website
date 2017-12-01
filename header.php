<?php
// Start the session
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <title>GSU Class Website</title>

        <script type="text/javascript" src="/js/jquery.min.js"></script>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/mainwebsite.css">
    <style type="text/css">

      html,body { height: 100%; margin: 0px; padding: 0px; }
      #full { background: #0f0; height: 100%;}

    </style>
    </head>
  <!-- enables next line for text area -->  
    <script>
        $('textarea').keypress(function(event) {
   if (event.which == 13) {
      event.preventDefault();
      var s = $(this).val();
      $(this).val(s+"\n");
   }
});
    </script>
    
    <div>    
        
<!------------------------------------------------------SEARCH--------------------------------------------->        
        <div class="rightsearch">
        <form>
        <input type="text" size="30" onkeyup="showResult(this.value)">
            <div id="livesearch" style="position: absolute; z-index: 999; width: auto; background-color:white;"></div>
        </form>
        </div>
            
        <script>showResult(this.value)
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","/livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
        
<!---------------------------------------------------------------------------------------------------------->       
        
        
        
            <?php
            if($_SESSION['signed_in'])
    {   //if user is signed in, display name
        echo '<div class="rightsearch" style="color:white;"> Hello ' . $_SESSION['user_name'] . '. Not you? <a href="/logout.php">Sign out</a></div>';
    }
    else
    {   //if no usr signed in, give option to sign in or create 'account'
        echo '<div class="rightsearch"><a href="/index.html">Sign in</a> or <a href="/firstlogin.html">create an account</a>.</div>';
    }
            ?>
            
        </div>
        <div >
        <img class="logo" src="http://www.gsu.edu/wp-content/themes/gsu-flex-2/images/logo.png" alt="GSULOGO">
        <div class="menubar" style="">
            <a class="menutext" href="/home.php">Home</a>
            
                <div class="dropdown">
            <a class="menutext" href="https://grid.cs.gsu.edu/~ncasturi1/SWEFall2017/index.htm">Classes</a>
                    <div class="dropdown-content">
                        <a href="https://grid.cs.gsu.edu/~ncasturi1/SWEFall2017/index.htm">Software Engineering 4350</a>
                        <a href="https://grid.cs.gsu.edu/~ncasturi1/SWEFall2017/index.htm">Software Engineering 6350</a>
                    </div>
                </div>
            
            <a class="menutext" href="/forum/forum.php">Discussion Board</a>
            <a class="menutext" href="/calendar/calendar.php">Calender</a>
            <a class="menutext" href="/main-drop.php">Dropbox</a>
        </div>
    
    <body class="cont">

        
            <div class="container">