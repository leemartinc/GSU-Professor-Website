<?php
   session_start();
   unset($_SESSION["user_name"]);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = index.html');
?>