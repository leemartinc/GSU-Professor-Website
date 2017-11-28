<?php
//create_cat.php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';

if(!is_dir($_SESSION['user_filepath'])){
    
    mkdir($_SESSION['user_filepath'], 0700, true);
        
    }


?>

<style>
  body {
    font-size: 12pt;
  }
  
  #filedrop {
    width: 400px;
    height: 100px;
    color: Gray;
    border: 15px double Blue;
  }
    
    .box__dragndrop,
.box__uploading,
.box__success,
.box__error {
  display: none;
}
    
.box.has-advanced-upload {
  background-color: white;
  outline: 2px dashed black;
  outline-offset: -10px;
}
.box.has-advanced-upload .box__dragndrop {
  display: inline;
}    
    
#drop_zone {
  border: 5px solid blue;
  width:  200px;
  height: 100px;
}    
    
</style>


<script>
function drop_handler(ev) {
  console.log("Drop");
  ev.preventDefault();
  // If dropped items aren't files, reject them
  var dt = ev.dataTransfer;
  if (dt.items) {
    // Use DataTransferItemList interface to access the file(s)
    for (var i=0; i < dt.items.length; i++) {
      if (dt.items[i].kind == "file") {
        var f = dt.items[i].getAsFile();
        console.log("... file[" + i + "].name = " + f.name);
      }
    }
  } else {
    // Use DataTransfer interface to access the file(s)
    for (var i=0; i < dt.files.length; i++) {
      console.log("... file[" + i + "].name = " + dt.files[i].name);
    }  
  }
}
    function dragover_handler(ev) {
  console.log("dragOver");
  // Prevent default select and drag behavior
  ev.preventDefault();
}
    
    function dragend_handler(ev) {
  console.log("dragEnd");
  // Remove all of the drag data
  var dt = ev.dataTransfer;
  if (dt.items) {
    // Use DataTransferItemList interface to remove the drag data
    for (var i = 0; i < dt.items.length; i++) {
      dt.items.remove(i);
    }
  } else {
    // Use DataTransfer interface to remove the drag data
    ev.dataTransfer.clearData();
  }
}

</script>

<!-----------------------------------files 3.0------------------------------------>
<h1 style="color:black;">Upload your file for the latest assignment</h1>

<link href="file-drop/dropzone.css" type="text/css" rel="stylesheet" />
 
<!-- 2 -->
<script src="file-drop/dropzone.js"></script>

 
<!-- 3 -->
<form action="upload2.php" class="dropzone" name="uploaded_file">
</form>




<!-------------------------------------------------------------------------------------->





<!----------------------------------- if instructor/admin----------------------------------->
<div style="<?php if($_SESSION['user_level'] == 1){ ?> display: inline-block; <?php }else{ ?>display: none;<?php } ?>">
    <p style="color:black;"> This is a list of the submitions since the last clear. If you're ready for a new assignment submition, hit "clear" and come back by the due date.</p>
    
    <form method="post" action=""  onsubmit="return confirm('Are you sure you want to Clear the table?');">
    
    <input class="button" style="float:right;" type="submit" name="clear" value="Clear List">
    
           </form>     
           
<?php
$sql = "SELECT * FROM files ORDER BY file_date DESC";
 
$result = mysqli_query($conn, $sql);
 
if($result)
{

    if(mysqli_num_rows($result) == 0)
    {
        echo 'No files uploaded yet.';
    }
    else
    {
        //prepare the table
        echo '<table class="table-fill">
              <tr>
                <th>File By</th>
                <th>File Name</th>
                <th>File Date</th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
        {               
            echo '<tr>';
            
                  echo '<td>'. $row['file_by'] .'</td>';
            echo '<td><a href="'. $row['file_location'] .'" download>'. $row['file_name'] .'</a></td>';
             echo '<td>'. $row['file_date'] .'</td>';

            
            echo '</tr>';
        }
        echo '</table>';            
    }
}
else
{
     echo 'The categories could not be displayed, please try again later.';
}
    
    if(isset($_POST['clear'])){
            
            $sql2 = "DELETE FROM files;";
            
            $result2 = mysqli_query($conn, $sql2);
                         
        if(!$result2)
        {
            echo 'Your table has not been saved, please try again later.'. mysqli_error($conn);
        }
        else
        {
             echo "<meta http-equiv='refresh' content='0'>";
        } 
            
        }

?>
</div>    
<!------------------------------------------------------------------------------------------->

<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>