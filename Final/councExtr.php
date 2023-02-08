<?php
if (isset($_POST['submit'])) {  //condition to run php after submit
    //$file = $_FILES['file'];
    //print_r($file) ;
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    move_uploaded_file($fileTmpName, 'counc.csv');
    echo $fileName;
//var_dump($arr);
}

$conn = new mysqli("localhost", "root", "", "new"); //details

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$i = 0;
if (($open = fopen('counc.csv', "r")) !== FALSE){
    $sql = "DELETE FROM `counsellors` WHERE 1";
            try {
                if ($conn->query($sql) === TRUE) {
                    echo "deleted";
                }
            } catch (Exception $ex) {
                #echo "catch";
            }
    while (($data = fgetcsv($open, 10000, ",")) !== FALSE) 
          {        
            if($i==0){

            } else {
            $counc = $data;
            $array[] = $data;
            $c = count($counc);
            #echo $c;
            #var_dump($array);

            $sql = "INSERT INTO `counsellors`(`name`, `id`, `year`, `branch`, `fromRange`, `toRange`, `mail`, `mobilenumber`) VALUES('" . $counc[0] . "','" . $counc[1] . "', '" . $counc[2] . "', '" . $counc[3] . "',
            '" . $counc[4] . "','" . $counc[5] . "','" . $counc[6] . "','" . $counc[7] . "')";

            try {
                if ($conn->query($sql) === TRUE) {
                    echo "inserted";
                }
            } catch (Exception $ex) {
                #echo "catch";
            }
        }
        $i+=1;
            //catch(Exception $ex) {
            //  echo "already inserted";
            //}
          }
          fclose($open);
    }

    $conn->close();
 ?>