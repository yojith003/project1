<!-- PHP code to establish connection with the localserver -->
<?php
$sem = $_POST["Semester"];
#if(isset($_POST['submit'])){
#    $sem = $_POST['Semester'];
#}
$input = $_POST["register"];
// Username is root
$user = 'root';
$password = '';

// Database name is geeksforgeeks
$database = 'new';

// Server is localhost with
// port number 3306
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
if($sem == 'all'){
    $sql = " SELECT * FROM $input";
}
else{
    $sql = " SELECT * FROM $input WHERE SEM = '" . $sem . "'";
}

$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Student Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
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
	<section>
		<h1>RRR</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>
				<th>Register No</th>
				<th>Subject Code</th>
				<th>Subject Name</th>
				<th>Internals</th>
                <th>Grade</th>
				<th>Credits</th>
				<th>Semester</th>
                <th>Date</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				$grade = array();
				$credits = array();
				$date = array();
				$subcode = array();
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				<td><?php echo $rows['HTNO'];?></td>
				<td><?php echo $rows['SUBCODE'];?></td>
				<td><?php echo $rows['SUBNAME'];?></td>
				<td><?php echo $rows['INTERNALS'];?></td>
                <td><?php echo $rows['GRADE'];?></td>
				<td><?php echo $rows['CREDITS'];?></td>
				<td><?php echo $rows['SEM'];?></td>
				<td><?php echo $rows['MON_YEAR'];?></td>
				<?php array_push($grade,$rows['GRADE']);?>
				<?php array_push($subcode,$rows['SUBCODE']);?>
				<?php array_push($credits,$rows['CREDITS']);?>
				<?php array_push($date,$rows['MON_YEAR']);?>

			</tr>
			<?php
				}
			?>
			<?php
			function mapping($x)
			{
				if ($x == 'F' or $x == 'ABSENT' or $x=='MP') {
					return -1;
				}
				if($x=='A+')
				return 10;
				else if ($x == 'A')
					return 9;
				else if ($x == 'B')
					return 8;
				else if ($x == 'C')
					return 7;
				else if ($x == 'D')
					return 6;
				else if ($x == 'E')
					return 5;
				else if ($x == 'COMPLE')
					return 0;
				else {
					return 0;
				}

			}
			$ddate = array();
			$finalgrade = array();
			$finalcredits = array();
			$tmpsubcode = array();
			$uniquesubcode = array();
			$flag = 0;

			//SUBCODE UNIQUE
			for($i=0;$i<count($subcode);$i++){
				$flag = 0;
				for($j=0;$j<count($tmpsubcode);$j++){
					if ($subcode[$i] == $tmpsubcode[$j]) {
						$flag = 1;
					}
				}
				if ($flag == 0) {
					array_push($tmpsubcode,$subcode[$i]);
					#array_push($indices, $i);
				}
			}

			//Finding unique subjectcode indices with latest dates
			
			$indices = array();
			for ($i = 0; $i < count($tmpsubcode);$i++){
				$day = '0';
				$idx = 0;

				for ($j = 0; $j < count($subcode); $j++) {
					if($tmpsubcode[$i]==$subcode[$j]){
						if ($day < $date[$j]) {
							$day = $date[$j];
							$idx = $j;
						}
					}
				}
				array_push($indices, $idx);
			}
			#print_r($indices);

			//Finalcredits and Finalgrades
			for ($i = 0; $i < count($indices); $i++) {
				$finalgrade[$i] = $grade[$indices[$i]];
				$finalcredits[$i] = $credits[$indices[$i]];
			}
			#print_r($finalgrade);
			#print_r($tmpsubcode);

			$gradepoints = (array_map("mapping",$finalgrade));

			$i = 0;
			$num = 0;
			$den = 0;
			while ($i < count($finalcredits)) {
				$num+= $gradepoints[$i] * $finalcredits[$i];
				$den += $credits[$i];
				$i += 1;
			}
			if(in_array(-1, $gradepoints)) {
				$sgpa = 0;
			} else {
				$sgpa = round($num / $den, 2);
			}
			?>
		</table>
		<p class = "gpa" >GPA is <?php echo $sgpa?></p>
	</section>
</body>

</html>
