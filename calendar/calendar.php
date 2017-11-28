<?php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
include_once('functions.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="jquery.min.js"></script>
</head>
<body>
    
<a class="button3" style="float: right; <?php if($_SESSION['user_level'] == 1){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>" href="/calendar/addEvent.php">Add Event</a>
    <div id="livesearch" style="position: absolute; z-index: 999; width: auto; background-color:black;"></div>
<button class="button3" style="float: right; <?php if($_SESSION['user_level'] == 1){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>" href="/forum/create_cat.php">Delete Event</button>
    
<div id="calendar_div">
	<?php echo getCalender(); ?>
</div>

</body>
</html>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>