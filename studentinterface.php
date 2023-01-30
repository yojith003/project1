<!DOCTYPE html>
<html>
  <style>
.reg{
  margin: auto;
  width: 50%;
  border:5px solid red;
  padding: 10px;
  margin-top:10%; 
}
.submitbtn{
 

font-family:robot, sans-serif;
font-weight: 0;
font-size: 14px;
color: #fff;
background-color: #0066CC;
padding: 10px 30px;
border: 2px solid #0066cc;
box-shadow: rgb(0, 0, 0) 0px 0px 0px 0px;
border-radius: 50px;
transition : 1000ms;
transform: translateY(0);
display: flex;
flex-direction: row;
align-items: center;
cursor: pointer;
}

.submitbtn:hover{

transition : 1000ms;
padding: 10px 50px;
transform : translateY(-0px);
background-color: #fff;
color: #0066cc;
border: solid 2px #0066cc;
}



  </style>
<body style="background-image:url('Web-design.jpg');">
<div style="text-align: center;"  class="reg">
<h1  class="hdng">Enter Register number</h1>
<form action="resultdisplay.php" target="_blank" method = "post" enctype="multipart/form-data">
  <!--<label for="filename">Select a file:</label>-->
  <input class="inputreg" type="text" name="register" value = ""><br><br>
  <select class="drpdown" name="Semester" id="Semester">
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
  <button style="height: 25px; width: 30px;" class="submitbtn" type="submit" name="submit">Submit</button>
</form>
</div>
</body>
</html>