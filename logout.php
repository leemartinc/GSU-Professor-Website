<?php
    session_start();
    session_unset();
    session_destroy();
   
?>

<!DOCTYPE composition PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><body>
<div class="wrapper">
<div class="lockscreen-wrapper" style="text-align: center;">
<div class="lockscreen-logo">
<img src="https://idp.gsu.edu/oxauth/img/login-form-image.jpg" alt="Georgia State University" class="img-responsive center-block" /><br>
<b style="font-size: 1.7em !important;">Logged Out</b>
</div>
<!-- User name -->
<div class="lockscreen-name" style="text-align: center;font-size: 1.2em !important;margin-top: 10px; margin-bottom: 10px;">Please close your browser <b>COMPLETELY</b> to finish logging out.</div>
    <div class="lockscreen-name" style="text-align: center;font-size: 1.2em !important;margin-top: 10px; margin-bottom: 10px;">If you'd like to log back in, <a class="button3" href="/index.html">click here</a></div>
</div>
</div>
    </body>
</html>


<?php

exit();
?>