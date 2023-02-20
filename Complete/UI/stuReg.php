<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="sample.css">
    <link rel="stylesheet" href="style2.css">

    <title>Login</title>
    <style></style>
  </head>
  <body>
    <?php require '_nav.php' ?>
    <h1 style=" text-align: center; padding-top: 50px;" >Enter RegisterNo</h1>
    <div class="center" style=" text-align: center; margin-bottom: 10px;">
<form action="../Student/resultdisplay.php" target="_blank" method = "post" enctype="multipart/form-data">
  <!--<label for="filename">Select a file:</label>-->
  <div class="txt_field" style="margin-top: 20px; border-bottom: none;">
  <input placeholder="RegisterNo" style="margin-bottom: -70px; " class="form-control" id="username" type="text" name="register" value = ""><br><br>
  </div>

  <select style="margin-left: 10px" class="drpdown" name="Semester" id="Semester">
    <option value="all">All</option>
    <option value="I B.TECH I Sem">I I</option>
    <option value="I B.TECH II Sem">I II</option>
    <option value="II B.TECH I Sem">II I</option>
    <option value="II B.TECH II Sem">II II</option>
    <option value="III B.TECH I Sem">III I</option>
    <option value="III B.TECH II Sem">III II</option>
    <option value="IV B.TECH I Sem">IV I</option>
    <option value="IV B.TECH II Sem">IV II</option>
    </select>

  <button style="margin-left: 160px" class="btn btn-primary" type="submit" name="submit">Submit</button>
</form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>