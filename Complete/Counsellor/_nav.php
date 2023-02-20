<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</html>
<?php 

#if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= false;
#}
#else{
#  $loggedin = false;
#}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../Counsellor/welcome.php">Counsellors</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../UI/Home.php">Home <span class="sr-only">(current)</span></a>
      </li>';

      if(!$loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="../UI/CouncLogin.php">Login</a>
      </li>
      <!--
      <li class="nav-item">
        <a class="nav-link" href="/loginsystem/signup.php">Signup</a>
      </li> -->';
      
      }
      if($loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="/loginsystem/logout.php">Logout</a>
      </li>';
    }
       
    
    echo '</ul>
   
    
  </div>
</nav>';
?>