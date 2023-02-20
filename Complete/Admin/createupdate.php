<?php
if (isset($_POST['submit'])) {  //condition to run php after submit
    //$file = $_FILES['file'];
    //print_r($file) ;
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    move_uploaded_file($fileTmpName, 'resultfile.pdf');

    $command_exec = escapeshellcmd('python pdfext2.py');
    $command_exec1 = escapeshellcmd('python pdfCsv.py');
    $output = shell_exec($command_exec);
    $output1 = shell_exec($command_exec1);
    $arr = json_decode($output);
    $csvname =  $output1;
var_dump($arr);
}
    $conn = new mysqli("localhost", "root", "", "new"); //details
// Check connection
#echo ($arr[3]);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

////CREATION OF TABLES BASED ON REGISTER NUMBERS

if (($open = fopen("ok.csv", "r")) !== FALSE) //tempsheet.csv
{
  
    while (($data = fgetcsv($open, 10000, ",")) !== FALSE) 
    {        
        $stu = $data;
      $array[] = $data;
      $sql = "CREATE TABLE IF NOT EXISTS $stu[0](HTNO VARCHAR(10),
      SUBCODE VARCHAR(10),
      SUBNAME VARCHAR(50),
      INTERNALS VARCHAR(5),
      GRADE VARCHAR(10),
      CREDITS VARCHAR(10),
      SEM VARCHAR(30),
      MON_YEAR DATE,
      PRIMARY KEY(SUBCODE, MON_YEAR))";
      if ($conn->query($sql) === TRUE) {
        #echo "Table successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
    }
    fclose($open);
}

if (($open = fopen("ok.csv", "r")) !== FALSE){
while (($data = fgetcsv($open, 10000, ",")) !== FALSE) 
      {        
        $stu = $data;
        $array[] = $data;
        $c = count($stu);
        
        if($c == 6){
          $sql = "INSERT INTO $stu[0] VALUES('". $stu[0] . "','". $stu[1] . "', '". $stu[2] . "', '". $stu[3] . "',
          '". $stu[4] . "','". $stu[5] . "','". $arr[2] . "'
          ,'". $arr[3] . "')";
        }
  
        else{
          $sql = "INSERT INTO $stu[0] VALUES('". $stu[0] . "','". $stu[1] . "', '". $stu[2] . "', '0',
          '". $stu[3] . "','". $stu[4] . "','". $arr[2] . "'
          ,'". $arr[3] . "')";
        }
        //$sql = "UPDATE $stu[0] SET `GRADE`='" . $stu[4] . "' WHERE SUBCODE ='" . $stu[1] . "' AND MON_YEAR ='" . $arr[3] . "' ";
        try{
          if ($conn->query($sql) === TRUE) {
            echo "inserted";
          }
        }
        catch(Exception $ex){
          #echo "catch";
        }
        //catch(Exception $ex) {
        //  echo "already inserted";
        //}
      }
}
if (($open = fopen("ok.csv", "r")) !== FALSE){
    
while (($data = fgetcsv($open, 10000, ",")) !== FALSE){
    $stu = $data;
    if($arr[0]=='Result'){
      if($c == 6){
        $sql = "UPDATE $stu[0] SET `INTERNALS`='" . $stu[3] . "', `GRADE`='" . $stu[4] . "', `CREDITS`='" . $stu[5] . "' WHERE SUBCODE ='" . $stu[1] . "' AND MON_YEAR ='" . $arr[3] . "' ";
        }
        else{
          $sql = "UPDATE $stu[0] SET `INTERNALS`= '0' , `GRADE`='" . $stu[3] . "', `CREDITS`='" . $stu[4] . "' WHERE SUBCODE ='" . $stu[1] . "' AND MON_YEAR ='" . $arr[3] . "' ";
        }
        #$sql = "UPDATE $stu[0] SET `GRADE`='" . $a . "' WHERE SUBCODE ='" . $stu[1] . "' AND MON_YEAR ='" . $arr[3] . "' ";
      if ($conn->query($sql) === TRUE) {
        echo "updated";
      } else {
        echo "Error creating table: " . $conn->error;
      }
    }
  else{
    $flag = str_contains($stu[4],'No');
        echo '<br> cond' . $flag;
        #echo 'cond' . ($flag==false) . '<br>';
        if($flag){
          continue;
        }
        else{
          $sql = "UPDATE $stu[0] SET `INTERNALS`='" . $stu[3] . "', `GRADE`='" . $stu[4] . "', `CREDITS`='" . $stu[5] . "' WHERE SUBCODE ='" . $stu[1] . "' AND MON_YEAR ='" . $arr[3] . "' ";
  
          if ($conn->query($sql) === TRUE) {
            echo "";
          } else {
            echo "Error creating table: " . $conn->error;
          }
        }
      }

    }
    fclose($open);
  }
$conn->close();
?>