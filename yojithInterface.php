<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   body{ 
    background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(116,116,177,1) 35%, rgba(0,212,255,1) 100%);
   }
   .button{
    display: ;
  border-radius: 4px;
  background-color: #e2ad1e63;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 8px;
   }
   .buttons{
    display: block;
    text-align: center;
   margin-top: 5%;
   }
   
</style>
<body>
    <div>
    </div>
    
    <div class="buttons">
    <img src="logo.png" alt="crr college" width="200" height="200" >
    <form action="login.php" method = "post" enctype="multipart/form-data">
        <button class="button" style="vertical-align:middle" type="submit" name="submit">Admin</button>
    </form>
    <form action="studentinterface.php" method = "post" enctype="multipart/form-data">
        <button class="button" style="vertical-align:middle" type="submit" name="submit">Student</button>
    </form>
    <form action="fileset.php" method = "post" enctype="multipart/form-data">
        <button class="button" style="vertical-align:middle" type="submit" name="submit">counsellor</button>
    </form>
    <form action="inputdup.php" method = "post" enctype="multipart/form-data">
        <button class="button" style="vertical-align:middle" type="submit" name="submit">HOD</button>
    </form>
    </div>
</body>
</html>
<?php>