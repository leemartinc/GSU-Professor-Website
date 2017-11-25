<?php
//create_cat.php
include $_SERVER['DOCUMENT_ROOT'] . '/connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/header.php';
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
</style>


  <h1>Drag-Drop</h1>
  <p>Drop files in box: </p>
  <div id="filedrop">
  <p>GSU uploader</p></div>
  <p>File Info: </p>
  <div id="filedata"></div>
    
  <form action="/file-drop/upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="upload">
      
</form>

<!----------------------------------- if instructor/admin----------------------------------->
<?php
$sql = "SELECT * FROM files ORDER BY date";
 
$result = mysqli_query($conn, $sql);
 
if($result)
{

    if(mysqli_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
        //prepare the table
        echo '<table class="table-fill">
              <tr>
                <th>File Name</th>
                <th>File By</th>
                <th>File Date</th>
              </tr>'; 
             
        while($row = mysqli_fetch_assoc($result))
        {               
            echo '<tr>';
            ?>

            <td></td>
            <td></td>
            <td></td>

            <?php
            echo '</tr>';
        }
        echo '</table>';            
    }
}
else
{
     echo 'The categories could not be displayed, please try again later.';
}

?>
<!------------------------------------------------------------------------------------------->

<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>