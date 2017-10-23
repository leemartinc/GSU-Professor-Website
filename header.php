<?php
// Start the session
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
        <title>Class Website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/mainwebsite.css">
    </head>
    <body>
        <div>
            <?php
            if($_SESSION['signed_in'])
    {
        echo 'Hello' . $_SESSION['user_name'] . '. Not you? <a href="logout.php">Sign out</a>';
    }
    else
    {
        echo '<a href="index.html">Sign in</a> or <a href="firstlogin.html">create an account</a>.';
    }
            ?>
            
            <a class="logout" href="#">Logout</a>
            <input class="rightsearch">
        </div>
        <div id="wrapper">
        <img class="logo" src="http://www.gsu.edu/wp-content/themes/gsu-flex-2/images/logo.png" alt="GSULOGO">
        <div class="menubar">
            <a class="menutext" href="home.html">Home</a>
            <a class="menutext" href="#Classes">Classes</a>
            <a class="menutext" href="create_cat.php">Discussion Board</a>
            <a class="menutext" href="#Classes">Calender</a>
            <a class="menutext" href="#Classes">Dropbox</a>
        </div>
            <div id="content">