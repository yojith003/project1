<!DOCTYPE html>
<html>
<body>

<h1>File UPLOAD</h1>

<h3>Select file to UPLOAD:</h3>
<form action="createupdate.php" method = "post" enctype="multipart/form-data">
  <!--<label for="filename">Select a file:</label>-->
  <input type="file" name="file"><br><br>
  <button type="submit" name="submit">UPLOAD</button>
</form>
    
</body>
</html>