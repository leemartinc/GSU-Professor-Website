<?php
    session_start();
    session_unset();
    session_destroy();
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = /index.html');

exit();
?>