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
<script>
function init() {
     var bHaveFileAPI = (window.File && window.FileReader);

     document.getElementById("filedrop").addEventListener("drop", onFilesDropped);
     document.getElementById("filedrop").addEventListener("dragover", onDragOver);
     document.getElementById("fileElem").addEventListener("change", onFileChanged);

   }
   }

   function onFileChanged(theEvt) {
     var thefile = theEvt.target.files[0];
     console.log(thefile);
     // check to see if it is text
     if (thefile.type != "text/plain") {
       document.getElementById('filecontents').innerHTML = "No text file chosen";
       return;
     }

     var reader = new FileReader();

     reader.onload = function(evt) {
       var resultText = evt.target.result;
       document.getElementById('filecontents').innerHTML = resultText;
     }

     reader.readAsText(thefile);
   }

   function onDragOver(theEvt) {
     theEvt.stopPropagation();
     theEvt.preventDefault();
   }

   function onFilesDropped(theEvt) {
     theEvt.stopPropagation();
     theEvt.preventDefault();

     var files = theEvt.target.files;

     document.getElementById('filedata').innerHTML = "";
     for (var i = 0; i <= files.length; i++) {
       var fileInfo = "<p>File name: " + files[i].name + "; size: " + files[i].size + "; type: " + files[i].type + "</p>";
       document.getElementById('filedata').innerHTML += fileInfo;
     }
   }

   window.addEventListener("load", init);
</script>

<body>
  <h1>Drag-Drop</h1>
  <p>Drop files in box: </p>
  <div id="filedrop">
  <p>GSU uploader</p></div>
  <p>File Info: </p>
  <div id="filedata"></div>
  <form action="">
    <label>Select file: </label>
    <input type="file" name="files" id="fileElem" />
  </form>
</body>

<form action="/file-drop/upload.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>