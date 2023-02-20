<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

include '../dbconn.php';

$id = $_SESSION['username'];
$sql = " SELECT * FROM counsellors WHERE id = '" . $id . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$from = $row['fromRange'];
$to = $row['toRange'];
$name = $row['name'];

$start = $from;
$end = $to;
$first8 = substr($start, 0, 7);
$last2 = substr($start,7);
$last2 = intval($last2);
$regno = $start;

$sql = " SELECT * FROM s";

require '../Student/resCal.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="../UI/sample.css">
    <title>Welcome</title>
    <style>
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}

		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
		.gpa {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}
	</style>
  </head>
  <body>
    <?php require '_nav.php' ?>
    <p> <?php echo $name?></p>

    <table>
			<tr>
				<th>Register No</th>
				<th>   CGPA   </th>
				<th>No Of Backlogs</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
            $i = 0;
            while ($regno != $end) {
                $first8 = substr($start, 0, 7);
                $last2 = substr($start,7);
                $last2 = intval($last2)+$i;
                $regno =  $first8.strval($last2);
                $sql = " SELECT * FROM $regno ";
                try{
                    $result = $conn->query($sql);
                }
                catch(Exception $e){
                    
                    $i += 1;
                    continue;
                }
                  $i += 1;
                  #$result = $conn->query($sql);

                while ($rows = $result->fetch_assoc()) {
					$res = gpa($rows['HTNO'],'all',$conn);
					$gradepoints = $res[0];
					$noofbacklogs = $res[1];

                    ?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
                    <?php $abc = $rows['HTNO'] ?>
				<td><?php echo "<a href='../Student/resultdisplay.php?name=$abc'" ?>><?php echo $rows['HTNO']; ?></a></td>
				<td><?php echo $gradepoints ?></td>
				<td><?php echo $noofbacklogs ?></td>

			</tr>
			<?php
            break;
                }
            }
            $conn->close();
			?>


</body>
</html>